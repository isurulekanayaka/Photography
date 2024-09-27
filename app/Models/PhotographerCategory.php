<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotographerCategory extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'photographers_category';

    // Define which fields are mass assignable
    protected $fillable = [
        'category_id',
        'photographer_id',
    ];

    /**
     * Get the category associated with the photographer category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the photographer associated with the photographer category.
     */
    public function photographer()
    {
        return $this->belongsTo(Photographer::class);
    }
}
