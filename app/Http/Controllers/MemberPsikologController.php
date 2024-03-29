<?php

namespace App\Http\Controllers;

use App\Models\Psikolog;
use Illuminate\Http\Request;

class MemberPsikologController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('member.psikolog.index', [
            'title' => 'MAMHI | Psikolog Kami',
            'page' => 'psikolog',
            'psikologs' => Psikolog::all(),
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
    public function show(Psikolog $psikolog)
    {
        return view('member.psikolog.show', [
            'title' => 'Profile '.$psikolog->user->name,
            'page' => 'psikolog',
            'psikolog' => $psikolog,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Psikolog $psikolog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Psikolog $psikolog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Psikolog $psikolog)
    {
        //
    }
}
