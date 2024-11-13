<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'superadmin') {
            return view('dashboard.superadmin_home');
        } else {
            return view('dashboard.admin_home');
        }
    }
}
