<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentView($id)
    {
        return view('payment.payment', compact('id'));
    }
    public function paymentConfirm($id)
    {
        // Find the appointment by id
        $appointment = Appointment::find($id);

        // Check if the appointment exists
        if (!$appointment) {
            return redirect()->back()->with('error', 'Appointment not found.');
        }

        // Update the approval status to 'approved'
        $appointment->approval = 'confirm';
        $appointment->save();

        return redirect()->route('home');
    }
}
