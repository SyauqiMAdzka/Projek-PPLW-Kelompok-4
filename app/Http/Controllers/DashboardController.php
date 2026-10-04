<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function adminIndex()
    {
        $user = Auth::user();
        return view('dashboard.admin', compact('user'));
    }

    public function staffIndex()
    {
        $user = Auth::user();
        return view('dashboard.staff', compact('user'));
    }
}
