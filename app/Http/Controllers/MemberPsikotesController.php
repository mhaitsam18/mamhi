<?php

namespace App\Http\Controllers;

use App\Models\Psikotes;
use Illuminate\Http\Request;

class MemberPsikotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('member.psikotes.index', [
            'title' => 'MAMHI | Psikotes',
            'page' => 'psikotes',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Psikotes $psikotes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Psikotes $psikotes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Psikotes $psikotes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Psikotes $psikotes)
    {
        //
    }
}
