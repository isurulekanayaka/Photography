<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $photographerCount = User::where('role', 'photographer')->count();
        $userCount = User::where('role', 'user')->count();
        $adminCount = User::where('role', 'admin')->count();
        $categoryCount = Category::count();
    
        return view('admin.dashboard', compact('photographerCount', 'userCount', 'adminCount', 'categoryCount'));
    }    

    public function adminPhotographer()
    {
        $users = User::where('role', "photographer")->get();
        $name="Photographer";
    
        return view('admin.photographer-user', compact('users','name'));
    }
    
    public function adminUser()
    {
        $users = User::where('role', "user")->get();
        $name="User";
    
        return view('admin.photographer-user', compact('users','name'));
    }

    public function adminAdmin()
    {
        $users = User::where('role', "admin")->get();
        $name="Admin";
    
        return view('admin.admin', compact('users','name'));
    }
    public function userDelete($id)
    {
        // Find the user by ID
        $user = User::find($id);
    
        // Check if the user exists
        if ($user) {
            // Delete the user
            $user->delete();
    
            // Optionally, you can add a success message or redirect
            return redirect()->back()->with('success', 'User deleted successfully.');
        } else {
            // Optionally, you can add an error message if the user doesn't exist
            return redirect()->back()->with('error', 'User not found.');
        }
    }
    
}    
