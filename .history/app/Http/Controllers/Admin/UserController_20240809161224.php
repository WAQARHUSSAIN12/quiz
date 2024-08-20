<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(Request $request){

        if ($request->ajax()){
            
            $data = User::select(['column1', 'column2', 'column3']); // Adjust the columns accordingly

            return DataTables::of($data)
                ->addColumn('action', function($row) {
                    return '<a href="/edit/'.$row->id.'" class="btn btn-sm btn-primary">Edit</a>';
                })
                ->make(true);

        }

        return view('backend.users.index');
    }
}
