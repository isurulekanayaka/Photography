<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image'];

    // Define the one-to-many relationship with Photographer
    public function photographers()
    {
        return $this->hasMany(Photographer::class);
    }

    public function photographers_category()
    {
        return $this->belongsToMany(Photographer::class, 'photographers_category', 'category_id', 'photographer_id');
    }
}
