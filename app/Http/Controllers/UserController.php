<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Photographer;
use Illuminate\Http\Request;

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
}
