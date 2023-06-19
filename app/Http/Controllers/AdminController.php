<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'title' => 'Dashboard',
            'page' => 'index'
        ]);
    }
    
    public function profile()
    {
        return view('admin.profile', [
            'title' => 'Profile',
            'page' => 'profile'
        ]);
    }
    
    public function profileUpdate(Request $request)
    {
    }
}
