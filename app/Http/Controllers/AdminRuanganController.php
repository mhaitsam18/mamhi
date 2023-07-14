<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class AdminRuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.ruangan.index', [
            'title' => 'List Ruangan',
            'page' => 'ruangan',
            'ruangans' => Ruangan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ruangan.create', [
            'title' => 'Buat ruangan',
            'page' => 'ruangan',
            'ruangans' => Ruangan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'ruangan' => 'required'
        ]);

        Ruangan::create($validateData);

        return redirect('/admin/ruangan')->with('success', 'Data Ruangan ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ruangan $ruangan)
    {
        return view('admin.ruangan.show', [
            'title' => 'Detail Ruangan',
            'page' => 'ruangan',
            'ruangan' => $ruangan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ruangan $ruangan)
    {
        return view('admin.ruangan.edit', [
            'title' => 'Detail Ruangan',
            'page' => 'ruangan',
            'ruangan' => $ruangan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ruangan $ruangan)
    {
        $validateData = $request->validate(['ruangan' => 'required']);

        $ruangan->update($validateData);

        return redirect('/admin/ruangan')->with('success', 'Data ruangan diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruangan $ruangan)
    {
        $ruangan->delete();
        return redirect('/admin/ruangan')->with('success', 'Ruangan dihapus');
    }
}
