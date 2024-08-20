<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Home;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function dashboard(){
        return view("backend.dashboard.dashboard");
    }
}
