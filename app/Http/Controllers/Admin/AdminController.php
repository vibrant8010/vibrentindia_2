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
        $cacheSize = $this->getCacheSize();
        // return view('cache.index');
        // Logic for displaying the admin dashboard
        return view('adminpanel.dashboard', compact('cacheSize')); // Ensure this view exists
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
    // public function cacheRmover()
    // {

    // }

    public function clear()
    {
        Artisan::call('cache:clear');
        // Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');

        return redirect()->back()->with('success', 'Cache cleared successfully.');
    }

    private function getCacheSize()
    {
        $cachePath = storage_path('framework');
        $size = $this->folderSize($cachePath);
        return round($size / 1024 / 1024, 2); // Size in MB
    }

    private function folderSize($path)
    {
        $size = 0;
        foreach (File::allFiles($path) as $file) {
            $size += $file->getSize();
        }
        return $size;
    }
}
