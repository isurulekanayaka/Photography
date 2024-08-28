<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function gallery(Request $request)
    {
        // Retrieve the photographer for the logged-in user
        $photographer = Auth::user()->photographer;

        if (!$photographer) {
            return redirect()->back()->with('error', 'Photographer not found.');
        }

        // Find the gallery associated with the photographer
        $gallery = Gallery::where('photographer_id', $photographer->id)->first();

        if (!$gallery) {
            return view('photographer.gallery');
        }

        // Retrieve images from the gallery
        $images = [
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
        ];
        
        // Pass images to the view
        return view('photographer.gallery', compact('images'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'image1' => 'nullable',
                'image2' => 'nullable',
                'image3' => 'nullable',
                'image4' => 'nullable',
                'image5' => 'nullable',
                'image6' => 'nullable',
                'image7' => 'nullable',
                'image8' => 'nullable',
                'image9' => 'nullable',
                'image10' => 'nullable',
            ]);
    
            // Find the logged-in user's photographer
            $photographer = Auth::user()->photographer;
    
            if (!$photographer) {
                return redirect()->back()->with('error', 'Photographer not found.');
            }
    
            // Find or create a gallery entry
            $gallery = Gallery::firstOrNew(['photographer_id' => $photographer->id]);
    
            // Handle image uploads
            for ($i = 1; $i <= 10; $i++) {
                if ($request->hasFile('image' . $i)) {
                    $image = $request->file('image' . $i);
                    $gallery->{"image_$i"} = $image->store('gallery_images', 'public');
                }
            }
    
            $gallery->save();
    
            return redirect()->route('galleries.index')->with('success', 'Gallery images updated successfully.');
        } catch (\Exception $e) {
            // Log the exception
            // \Log::error('Error storing gallery images: ' . $e->getMessage());
    
            // Redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred while uploading the images. Please try again.');
        }
    }
    
}
