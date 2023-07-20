<?php

namespace App\Http\Controllers;

use App\Models\Psikolog;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        return view('member.index', [
            'psikologs' => Psikolog::all(),
            'title' => 'Dashboard',
            'page' => 'index'
        ]);
    }
}