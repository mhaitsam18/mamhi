<?php

namespace App\Http\Controllers;

use App\Models\KomponenNilai;
use Illuminate\Http\Request;

class AdminKomponenNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.komponen-nilai.index', [
            'title' => 'List Komponen Nilai',
            'page' => 'komponen-nilai',
            'komponen_nilais' => KomponenNilai::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.komponen-nilai.create', [
            'title' => 'Buat Komponen Nilai',
            'page' => 'komponen-nilai',
            'ruangans' => KomponenNilai::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_komponen' => 'required'
        ]);

        KomponenNilai::create($validateData);

        return redirect('/admin/komponen-nilai')->with('success', 'Data Komponen Nilai ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(KomponenNilai $komponenNilai)
    {
        return view('admin.komponen-nilai.show', [
            'title' => 'Detail Komponen Nilai',
            'page' => 'komponen-nilai',
            'komponen_nilai' => $komponenNilai,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KomponenNilai $komponenNilai)
    {
        return view('admin.komponen-nilai.edit', [
            'title' => 'Detail Komponen Nilai',
            'page' => 'komponen-nilai',
            'komponen_nilai' => $komponenNilai,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KomponenNilai $komponenNilai)
    {
        $validateData = $request->validate(['nama_komponen' => 'required']);

        $komponenNilai->update($validateData);

        return redirect('/admin/komponen-nilai')->with('success', 'Data komponen nilai diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KomponenNilai $komponenNilai)
    {
        $komponenNilai->delete();
        return redirect('/admin/komponen-nilai')->with('success', 'Komponen Nilai dihapus');
    }
}
