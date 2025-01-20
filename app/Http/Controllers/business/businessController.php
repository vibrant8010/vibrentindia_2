<?php

namespace App\Http\Controllers\business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class businessController extends Controller
{
    public function index(){
        return view('businesspanel.dashboard');
    }
}
