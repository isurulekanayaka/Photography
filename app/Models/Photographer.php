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
        'category',
        'area',
        'city',
        'website',
        'profile_picture',
        'user_id',
        'availability',
        'cover_image',
    ];

    protected $casts = [
        'user_id' => 'integer',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
