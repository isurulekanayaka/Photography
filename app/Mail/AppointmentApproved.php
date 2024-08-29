<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;

    /**
     * Create a new message instance.
     */
    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Your Appointment Has Been Approved')
                    ->view('emails.appointment-approved')
                    ->with([
                        'date' => $this->appointment->date,
                        'location' => $this->appointment->location,
                        'messageContent' => $this->appointment->message,
                    ]);
    }
}
