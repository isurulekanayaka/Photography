<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Mail\AppointmentApproved;
use App\Mail\AppointmentRejected;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{

    public function inbox(Request $request)
    {
        // Retrieve the logged-in photographer
        $photographer = Auth::user()->photographer;

        // Retrieve appointments for the photographer where approval is 'not approved'
        $appointments = Appointment::where('photographer_id', $photographer->id)
            ->where('approval', 'not approved')
            ->get();

        // Pass the appointments and user to the view
        return view('photographer.inbox', compact('appointments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photographer_id' => 'required|exists:photographers,id',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $user = Auth::user();

        Appointment::create([
            'photographer_id' => $request->input('photographer_id'),
            'date' => $request->input('date'),
            'location' => $request->input('location'),
            'message' => $request->input('message'),
            'user_id' => $user->id,
        ]);

        return redirect()->back()->with('success', 'Appointment created successfully.');
    }

    public function approve($id)
    {
        // Find the appointment by id
        $appointment = Appointment::find($id);
    
        // Check if the appointment exists
        if (!$appointment) {
            return redirect()->back()->with('error', 'Appointment not found.');
        }
    
        // Update the approval status to 'approved'
        $appointment->approval = 'approved';
        $appointment->save();
    
        // Send approval email
        Mail::to($appointment->user->email)->send(new AppointmentApproved($appointment));
    
        return redirect()->back()->with('success', 'Appointment approved successfully and email sent.');
    }
    
    public function reject(Request $request)
    {
        // Find the appointment by id
        $appointment = Appointment::find($request->id);
    
        // Check if the appointment exists
        if (!$appointment) {
            return redirect()->back()->with('error', 'Appointment not found.');
        }
    
        // Update the approval status to 'reject'
        $appointment->approval = 'reject';
        $appointment->save();
    
        // Send rejection email
        Mail::to($appointment->user->email)->send(new AppointmentRejected($appointment, $request->message));
    
        return redirect()->back()->with('success', 'Appointment rejected successfully and email sent.');
    }

    public function approved(Request $request)
    {
        // Retrieve the logged-in photographer
        $photographer = Auth::user()->photographer;

        // Retrieve appointments for the photographer where approval is 'approved'
        $appointments = Appointment::where('photographer_id', $photographer->id)
            ->where('approval', 'approved')
            ->get();

        // Pass the appointments and user to the view
        return view('photographer.approve-reject', compact('appointments'));
    }

    public function rejections(Request $request)
    {
        // Retrieve the logged-in photographer
        $photographer = Auth::user()->photographer;

        // Retrieve appointments for the photographer where approval is 'reject'
        $appointments = Appointment::where('photographer_id', $photographer->id)
            ->where('approval', 'reject')
            ->get();

        // Pass the appointments and user to the view
        return view('photographer.approve-reject', compact('appointments'));
    }

    public function booking(Request $request)
    {
        // Retrieve the logged-in photographer
        $photographer = Auth::user()->photographer;
    
        // Retrieve appointments for the photographer where approval is 'reject' and the date is today or later
        $appointments = Appointment::where('photographer_id', $photographer->id)
            ->where('approval', 'confirm')
            // ->whereDate('date', '>=', now()->toDateString())
            ->get();
    
            // dd($photographer);
        // Pass the appointments and user to the view
        return view('photographer.appoiment', compact('appointments'));
    }
    
}
