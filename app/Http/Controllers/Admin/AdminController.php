<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        // Logic for displaying the admin dashboard
        return view('adminpanel.dashboard'); // Ensure this view exists
    }

    public function users()
    {
        // Logic for displaying the users list
        return view('adminpanel.users'); // Ensure this view exists
    }

    // public function index(){
    //     return view('businesspanel.dashboard');
    // }
    // public function users()
    // {
    //     // Logic for displaying the users list
    //     return view('adminpanel.users'); // Ensure this view exists
    // }
}
