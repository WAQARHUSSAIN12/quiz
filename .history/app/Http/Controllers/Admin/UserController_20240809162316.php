<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User

class UserController extends Controller
{
    //
    public function index(Request $request){

        if ($request->ajax()){            
            $user = User::select(['name', 'email', 'password']); // Adjust the columns accordingly
            return DataTables::of($user)->make(true);

        }

        return view('backend.users.index');
    }
}
