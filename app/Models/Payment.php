<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // Specify the table associated with the model (optional if the name is default)
    protected $table = 'payments';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'amount',
        'appointment_id',
        'status',
        'user_id',
        'photographer_id',
    ];

    // Define the one-to-one relationship with the Appointment model
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photographer()
    {
        return $this->belongsTo(Photographer::class);
    }
}
