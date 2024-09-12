<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Category;
use Log;
use Storage;
use App\Models\Gallery;
use App\Models\Photographer;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
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

            return view('user.profile', compact('photographer', 'images','rating','latest'));
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
        return view('photographer.profile', compact('user','categories'));
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
                'categories' => 'nullable|string|max:255',
                'availability' => 'nullable|string|max:255',
                'cover_image' => 'nullable',
                'profile_image' => 'nullable',
            ]);

            // Update User info
            $user->name = $request->full_name;
            $user->email = $request->contact_email;
            $user->contact = $request->contact_number;

            // If the user wants to update their password
            if ($request->filled('old_password') && $request->filled('new_password')) {
                // Check if the old password matches
                if (Hash::check($request->old_password, $user->password)) {
                    $user->password = Hash::make($request->new_password);
                } else {
                    return back()->withErrors(['old_password' => 'The old password does not match our records.']);
                }
            }
            $user->save();

            // Check if the Photographer record exists
            $photographer = $user->photographer;
            if (!$photographer) {
                $photographer = new Photographer();
                $photographer->user_id = $user->id;
            }

            // Update Photographer info
            $photographer->description = $request->input('description', $photographer->description);
            $photographer->experience = $request->input('experience', $photographer->experience);
            $photographer->category_id = $request->input('categories', $photographer->category);
            $photographer->area = $request->input('address_area', $photographer->area);
            $photographer->city = $request->input('address_city', $photographer->city);
            $photographer->website = $request->input('website', $photographer->website);
            $photographer->availability = $request->input('availability', $photographer->availability);

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
            try {
                // dd($photographer); // This will show the model before saving
                $photographer->save();
                // dd($photographer); // This will show the model after saving
            } catch (\Exception $e) {
                // Log::error('Error saving photographer: ' . $e->getMessage());
                dd($e);
                return redirect()->back()->withErrors('An error occurred while saving the photographer. Please try again later.');
            }

            return redirect()->back()->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            // \Log::error('Profile update error: ' . $e->getMessage());
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
