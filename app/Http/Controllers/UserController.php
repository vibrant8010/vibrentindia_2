<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;
use Symfony\Component\HttpKernel\Attribute\Cache;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Get the search input from the request
        $search = $request->input('search');

        // Query the users based on the search input, if it exists
        $users = User::when($search, function ($query, $search) {
            return $query->where('username', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%")
                         ->orWhere('contact_no', 'like', "%{$search}%");
        })->get();

        // Return the view with the filtered user data
        return view('adminpanel.users.index', compact('users', 'search'));
    }
    public function show(Request $request){
         $user = User::all();
        // //  $users = 'hello';

        // //  return view('businesspanel.Users.show');
        // if ($request->ajax()) {
        //     // Fetch the necessary user data
        //     $users = User::select('id', 'name', 'role', 'email');

        //     // Return a DataTables response
        //     return DataTables::of($users)
        //         ->addColumn('action', function ($user) {
        //             // Add edit and delete buttons with dynamic links (if needed)
        //             return '
        //                 <a href="' . route('users.edit', $user->id) . '" class="btn btn-sm btn-primary">Edit</a>
        //                 <a href="' . route('users.destroy', $user->id) . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</a>
        //             ';
        //         })
        //         ->rawColumns(['action']) // Allow HTML in the action column
        //         ->make(true);
        // }
         return view('businesspanel.Users.show',compact('user'));

    }
    public function create()
    {
        return view('adminpanel.users.create'); // Adjust the view name as necessary
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'contact_no' => 'required|string|max:255',
        ]);

        // Create the user
        User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'contact_no' => $validatedData['contact_no'],
        ]);

        // Redirect back with a success message
        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('businesspanel.Users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'contact_no' => 'required|string|min:10|max:10',
        ]);

        // Update the user with new data
        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        // Delete the user
        $user->delete();

        // Redirect back with a success message
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function store_location(Request $request)
    {
        $state = $request['state'];
        $city = $request['city'];
        $postalCode = $request['postalCode'];
        //  print_r($city);die();
        // Store 'city' in the session
        Session::put('city', $city);

        // Retrieve and print 'city' from the session
        // print_r(session('city'));
        // die;

        return response()->json([
            'message' => 'Location data received successfully.',
            'data' => 'hello',
        ], 200);
    }
    private function getPlaceName($latitude, $longitude)
    {
        // // Construct the Nominatim API URL
        $url = "https://nominatim.openstreetmap.org/reverse?lat={$latitude}&lon={$longitude}&format=json";

        // // Make the HTTP request using Laravel's Http client
        $response = Http::get($url);

       dd($response);
        // if ($response->ok()) {
            $data = $response->json();
            // print_r($response);die;
            // Check if the display_name field is present in the response
            if (isset($data['display_name'])) {
                return $data['display_name'];
            }

            return $data;
        // }

        // return 'Unable to fetch location';
    }
}
