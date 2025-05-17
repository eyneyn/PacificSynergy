<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\ProductionReport;

class DashboardController extends Controller
{
    public function index()
    {
        $submittedCount = ProductionReport::where('status', 'Submitted')->count();

        if(Auth::user()->is_role == 3)
        {
            return view('admin.index', compact('submittedCount'));
        }
        else if(Auth::user()->is_role == 2)
        {
            return view('manager.index', compact('submittedCount'));
        }
        else if(Auth::user()->is_role == 1)
        {
            return view('analyst.index', compact('submittedCount'));
        }
        else if(Auth::user()->is_role == 0)
        {
            return view('senior.index', compact('submittedCount'));
        }
        else {
            return redirect('login')->with('error','No available email or password');
        }
    }
}
