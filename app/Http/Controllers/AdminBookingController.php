<?php

namespace App\Http\Controllers;

use App\Models\JenisPsikotes;
use App\Models\Member;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{

    public function index()
    {
        return view('admin.booking.index', [
            'title' => 'Booking',
            'page' => 'booking',
        ]);
    }
    public function konsultasi()
    {
        return view('admin.booking.konsultasi', [
            'title' => 'Booking Konsultasi',
            'page' => 'booking',
            'members' => Member::all(),
        ]);
    }
    public function psikotes()
    {
        return view('admin.booking.psikotes', [
            'title' => 'Booking Psikotes',
            'page' => 'booking',
            'jenis_psikotess' => JenisPsikotes::all(),
            'members' => Member::all(),
        ]);
    }


}
