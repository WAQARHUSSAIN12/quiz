<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(Request $request){

        if ($request->ajax()){
            
            $user = User::select(['column1', 'column2', 'column3']); // Adjust the columns accordingly

            return DataTables::of($user)->make(true);

        }

        return view('backend.users.index');
    }
}
