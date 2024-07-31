<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showRegistrationForm()
    {
        return view('admin.register');
    }
    public function showLoginForm()
    {
        return view('admin.login');
    }
   
}

