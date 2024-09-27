<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photographer extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'experience',
        'category_id',
        'area',
        'city',
        'website',
        'profile_picture',
        'user_id',
        'availability',
        'cover_image',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'user_id' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gallery()
    {
        return $this->hasOne(Gallery::class);
    }

    // Define the inverse of the one-to-many relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // Define the relationship to appointments
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'photographer_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

    public function photographers_category()
    {
        return $this->belongsToMany(Category::class, 'photographers_category', 'photographer_id', 'category_id');
    }
}
