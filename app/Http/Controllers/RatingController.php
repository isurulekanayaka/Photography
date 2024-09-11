<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'description' => 'required|string',
                'rating' => 'required|integer|min:1|max:5',
                'photographer_id' => 'required|exists:photographers,id', // Ensure the photographer exists
            ]);

            // Get the logged-in user's ID
            $userId = Auth::id();

            // Insert or update the rating data in the 'ratings' table
            Rating::updateOrCreate(
                [
                    'user_id' => $userId, // The logged-in user's ID
                    'photographer_id' => $validatedData['photographer_id'], // Photographer's ID
                ],
                [
                    'description' => $validatedData['description'],
                    'rating_value' => $validatedData['rating'], // The rating value
                ]
            );

            return redirect()->back()->with('success', 'Rating submitted successfully!');
        } catch (Exception $e) {
            return redirect()->back()->withErrors('An error occurred: ' . $e->getMessage());
        }
    }
}
