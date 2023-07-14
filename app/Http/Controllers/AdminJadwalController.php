<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Psikolog;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class AdminJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.jadwal.index', [
            'title' => 'List Jadwal',
            'page' => 'jadwal',
            'jadwals' => Jadwal::all(),
            'ruangans' => Ruangan::all(),
            'psikologs' => Psikolog::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jadwal.create', [
            'title' => 'Buat Jadwal',
            'page' => 'jadwal',
            'jadwals' => Jadwal::all(),
            'ruangans' => Ruangan::all(),
            'psikologs' => Psikolog::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'psikolog_id' => 'required',
            'ruangan_id' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        Jadwal::create([
            'psikolog_id' => $request->psikolog_id,
            'ruangan_id' => $request->ruangan_id,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => $request->status
        ]);

        return redirect('/admin/jadwal')->with('success', 'Data jadwal ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        return view('admin.jadwal.show', [
            'title' => 'Detail Jadwal',
            'page' => 'jadwal',
            'jadwal' => $jadwal,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        return view('admin.jadwal.edit', [
            'title' => 'Detail Jadwal',
            'page' => 'jadwal',
            'jadwal' => $jadwal,
            'ruangans' => Ruangan::all(),
            'psikologs' => Psikolog::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'psikolog_id' => 'required',
            'ruangan_id' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $jadwal->update([
            'psikolog_id' => $request->psikolog_id,
            'ruangan_id' => $request->ruangan_id,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => $request->status
        ]);

        return redirect('/admin/jadwal')->with('success', 'Data jadwal diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect('/admin/jadwal')->with('success', 'Jadwal dihapus');
    }

    public function jadwalPraktik()
    {
        
    }
}
