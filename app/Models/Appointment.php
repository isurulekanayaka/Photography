<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'photographer_id',
        'date',
        'location',
        'message',
        'approval',
        'user_id',
    ];

    // Define the relationship to the photographer
    public function photographer()
    {
        return $this->belongsTo(Photographer::class, 'photographer_id');
    }
    
    // Define the relationship to the user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
