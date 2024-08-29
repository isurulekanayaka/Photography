<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentRejected extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;
    public $rejectionReason;

    /**
     * Create a new message instance.
     */
    public function __construct($appointment, $rejectionReason)
    {
        $this->appointment = $appointment;
        $this->rejectionReason = $rejectionReason;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Your Appointment Has Been Rejected')
                    ->view('emails.appointment-rejected')
                    ->with([
                        'rejectionReason' => $this->rejectionReason,
                        'date' => $this->appointment->date,
                        'location' => $this->appointment->location,
                        'messageContent' => $this->appointment->message,
                    ]);
    }
}
