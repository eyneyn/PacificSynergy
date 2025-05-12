<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->is_role == 3)
        {
            return view('admin.index');
        }
        else if(Auth::user()->is_role == 2)
        {
            return view('manager.index');
        }
        else if(Auth::user()->is_role == 1)
        {
            return view('analyst.index');
        }
        else if(Auth::user()->is_role == 0)
        {
            return view('senior.index');
        }
        else {
            return redirect('login')->with('error','No available email or password');
        }
    }
}
