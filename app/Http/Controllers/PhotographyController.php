<?php

namespace App\Http\Controllers;

use App\Models\Photographer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotographyController extends Controller
{
    public function home()
    {
        $photographers = Photographer::take(10)->get();
        return view('user.home', compact('photographers'));
    }
    public function show($id)
    {
        $photographer = Photographer::findOrFail($id);
        return view('user.profile', compact('photographer'));
    }
    public function inbox(Request $request)
    {
        return view('photographer.inbox');
    }
    public function profile(Request $request)
    {
        $user = Auth::user();
        
        return view('photographer.profile',compact('user'));
    }
    public function gallery(Request $request)
    {
        return view('photographer.gallery');
    }
}
