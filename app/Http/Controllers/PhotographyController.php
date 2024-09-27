<?php

namespace App\Http\Controllers;

use Log;
use Storage;
use App\Models\User;
use App\Models\Rating;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Appointment;
use App\Models\Photographer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PhotographyController extends Controller
{
    public function home()
    {
        $photographers = Photographer::take(10)->get();
        $categories = Category::all();
        return view('user.home', compact('photographers', 'categories'));
    }
    public function show($id)
    {
        try {
            // Find the photographer
            $photographer = Photographer::findOrFail($id);
            $rating = Rating::calculate($id);
            $latest = Rating::latestReview($id);
            // dd($rating);
            // Find the gallery associated with the photographer
            $gallery = Gallery::where('photographer_id', $photographer->id)->first();

            // Default to an empty array if no gallery is found
            $images = $gallery ? [
                'image1' => $gallery->image_1,
                'image2' => $gallery->image_2,
                'image3' => $gallery->image_3,
                'image4' => $gallery->image_4,
                'image5' => $gallery->image_5,
                'image6' => $gallery->image_6,
                'image7' => $gallery->image_7,
                'image8' => $gallery->image_8,
                'image9' => $gallery->image_9,
                'image10' => $gallery->image_10,
            ] : [];

            return view('user.profile', compact('photographer', 'images', 'rating', 'latest'));
        } catch (\Exception $e) {
            // Log the exception (optional)
            // Log::error('Error retrieving photographer or gallery: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while retrieving the photographer or gallery. Please try again.');
        }
    }


    public function profile(Request $request)
    {
        $categories = Category::all();
        $user = Auth::user();
        
        return view('photographer.profile', compact('user', 'categories'));
    }

    public function profile_update(Request $request)
    {
        try {
            $user = auth()->user();
    
            // Validate the request data
            $request->validate([
                'full_name' => 'required|string|max:255',
                'contact_email' => 'required|email|max:255',
                'contact_number' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'experience' => 'nullable|string|max:255',
                'website' => 'nullable|url|max:255',
                'address_area' => 'nullable|string|max:255',
                'address_city' => 'nullable|string|max:255',
                'categories' => 'nullable|array', // Change to array for categories
                'categories.*' => 'integer|exists:categories,id', // Ensure each category ID exists
                'availability' => 'nullable|string|max:255',
                'cover_image' => 'nullable|image|max:2048', // Validate image size
                'profile_image' => 'nullable|image|max:2048',
                'latitude' => 'nullable|numeric',
                'longitude' => 'nullable|numeric',
            ]);
    
            // Update User info
            $user->name = $request->full_name;
            $user->email = $request->contact_email;
            $user->contact = $request->contact_number;
    
            // Update password if old and new passwords are provided
            if ($request->filled('old_password') && $request->filled('new_password')) {
                if (Hash::check($request->old_password, $user->password)) {
                    $user->password = Hash::make($request->new_password);
                } else {
                    return back()->withErrors(['old_password' => 'The old password does not match our records.']);
                }
            }
            $user->save();
    
            // Check if the Photographer record exists
            $photographer = $user->photographer ?? new Photographer(['user_id' => $user->id]);
    
            // Update Photographer info
            $photographer->description = $request->input('description', $photographer->description);
            $photographer->experience = $request->input('experience', $photographer->experience);
            $photographer->area = $request->input('address_area', $photographer->area);
            $photographer->city = $request->input('address_city', $photographer->city);
            $photographer->website = $request->input('website', $photographer->website);
            $photographer->availability = $request->input('availability', $photographer->availability);
            $photographer->latitude = $request->input('latitude', $photographer->latitude);
            $photographer->longitude = $request->input('longitude', $photographer->longitude);
    
            // Handle the cover image upload
            if ($request->hasFile('cover_image')) {
                if ($photographer->cover_image) {
                    \Storage::delete($photographer->cover_image);
                }
                $photographer->cover_image = $request->file('cover_image')->store('cover_images', 'public');
            }
    
            // Handle the profile image upload
            if ($request->hasFile('profile_image')) {
                if ($photographer->profile_picture) {
                    \Storage::delete($photographer->profile_picture);
                }
                $photographer->profile_picture = $request->file('profile_image')->store('profile_images', 'public');
            }
    
            // Save the photographer record
            $photographer->save();
    
            // Assuming categories is an array
            $categories = $request->categories ?? []; // This should be your categories array
            // Check if categories array is not empty
            if (!empty($categories)) {
                // Delete all existing records for the photographer in the pivot table
                $photographer->photographers_category()->detach(); // This will remove all associations
    
                // Prepare data for insertion
                $dataToInsert = [];
                foreach ($categories as $categoryId) {
                    $dataToInsert[] = [
                        'photographer_id' => $photographer->id,
                        'category_id' => $categoryId,
                    ];
                }
    
                // Insert new records based on the categories array
                DB::table('photographers_category')->insert($dataToInsert);
                return redirect()->back()->with('success', 'Categories updated successfully.');
            }
    
            return redirect()->back()->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            \Log::error('Profile update error: ' . $e->getMessage());
            return redirect()->back()->withErrors('An error occurred while updating the profile. Please try again later.');
        }
    }
    

    public function filter(Request $request)
    {
        $query = Photographer::query();

        // Filtering based on photographer's name
        if ($request->filled('photographer_name')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->input('photographer_name') . '%');
            });
        }

        // Filtering based on area or city
        if ($request->filled('location')) {
            $query->where(function ($q) use ($request) {
                $q->where('area', 'like', '%' . $request->input('location') . '%')
                    ->orWhere('city', 'like', '%' . $request->input('location') . '%');
            });
        }

        // Filtering based on category
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        $photographers = $query->get();
        $categories = Category::all();

        return view('user.photographers', compact('photographers', 'categories'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $query = Photographer::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                })
                    ->orWhere('area', 'like', '%' . $search . '%')
                    ->orWhere('city', 'like', '%' . $search . '%')
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('name', 'like', '%' . $search . '%');
                    });
            });
        }

        $photographers = $query->get();
        $categories = Category::all();

        return view('user.photographers', compact('photographers', 'categories'));
    }
}
