<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Payment;
use App\Models\Photographer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function index()
    {
        $id = Auth::id();
        $photographer_id = Photographer::where('user_id', $id)->first();

        $payments = Payment::where('photographer_id', $photographer_id->id)->get();
        // dd($payments);
        return view('photographer.payment', compact('payments'));
    }

    public function paymentView($id)
    {
        $appointment = Appointment::find($id);
        if ($appointment->approval == 'approved') {
            return view('payment.payment', compact('id'));
        } else {
            return redirect()->route('home');
        }
    }
    public function paymentConfirm(Request $request, $id)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'amount' => 'required|numeric|min:2500', // Ensure amount is numeric and at least 2500
            ]);

            // Find the appointment by id
            $appointment = Appointment::find($id);

            // Check if the appointment exists
            if (!$appointment) {
                return redirect()->back()->with('error', 'Appointment not found.');
            }

            // Update the appointment status to 'confirm'
            $appointment->approval = 'confirm'; // Ensure this status exists in your model
            $appointment->save();

            // Create a new payment record
            Payment::create([
                'amount' => $validatedData['amount'], // Use validated amount
                'appointment_id' => $appointment->id,
                'user_id' => $appointment->user_id,
                'photographer_id' => $appointment->photographer_id,
            ]);

            // Redirect to the home route with a success message
            return redirect()->route('home')->with('success', 'Payment confirmed and appointment updated.');
        } catch (\Exception $e) {

            dd($e);
            // Redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred while processing your payment. Please try again.');
        }
    }

    public function paymentUpdate(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'id' => 'required|exists:payments,id',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:advance,completed',
        ]);

        // Find the payment by id
        $payment = Payment::find($validated['id']);

        if (!$payment) {
            return redirect()->back()->withErrors('Payment not found.');
        }

        // Update the payment details
        $payment->amount = $validated['amount'];
        $payment->status = $validated['status'];
        $payment->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Payment updated successfully.');
    }
}
