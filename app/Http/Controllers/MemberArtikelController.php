<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class MemberArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('member.artikel.index', [
            'artikels' => Artikel::all(),
            'title' => 'Artikel',
            'page' => 'index'
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
    public function show(Artikel $artikel)
    {
        return view('member.artikel.show', [
            'artikel' => $artikel,
            'title' => $artikel->judul,
            'page' => 'index'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $artikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artikel $artikel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel)
    {
        //
    }
}
