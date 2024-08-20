<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index(Request $request){

        if ($request->ajax()){            
            $user = User::select(['name', 'email', 'created_at']); // Adjust the columns accordingly
            return DataTables::of($user)->make(true);

        }

        return view('backend.users.index');
    }

    public function create(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users,user_name',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'gender' => 'required|string',
            'status' => 'nullable|boolean',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|string|same:password', // Validate that confirm_password matches password
        ]);

        // Hash the password before storing it
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Create the user with the validated and modified data
        User::create($validatedData);

        return response()->json(['message' => 'User created successfully!'], 201);
    }

}
