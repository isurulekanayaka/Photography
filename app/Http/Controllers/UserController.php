<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Mail\ContactMessage;
use App\Models\Photographer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function photographers(Request $request)
    {
        $photographers = Photographer::all();
        $categories = Category::all();
        return view('user.photographers',compact('photographers','categories'));
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function about()
    {
        return view('user.about');
    }

    public function contact()
    {
        return view('user.contact');
    }
    public function contactMessage(Request $request)
    {
        // Validate the request data if necessary
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);
    
        // Send the email
        Mail::to($request->email)->send(new ContactMessage($request->name, $request->email, $request->message));
    
        // Optionally, return a response or redirect
        return redirect()->back()->with('success', 'Your message has been sent!');
    }
}
