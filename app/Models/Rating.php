<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'rating_value', 'user_id', 'photographer_id'];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Photographer
    public function photographer()
    {
        return $this->belongsTo(Photographer::class);
    }

    // Static method to calculate average rating for a photographer
    public static function calculate($photographerId)
    {
        // Retrieve all ratings for the given photographer
        $averageRating = self::where('photographer_id', $photographerId)
            ->avg('rating_value');

        // Return the rounded average rating, or 0 if no ratings exist
        return $averageRating ? round($averageRating, 2) : 0;
    }

    public static function latestReview($photographerId)
    {
        // Retrieve the latest 3 reviews for the given photographer
        return self::where('photographer_id', $photographerId)
            ->orderBy('created_at', 'desc') // Order by the most recent
            ->take(3) // Limit to 3 reviews
            ->get();
    }
}
