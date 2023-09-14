<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Konsultasi;
use App\Models\Member;
use App\Models\Pembayaran;
use App\Models\Psikolog;
use Illuminate\Http\Request;

class AdminKonsultasiController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.konsultasi.index', [
            'title' => 'List konsultasi',
            'page' => 'konsultasi',
            'konsultasis' => Konsultasi::all(),
            'members' => Member::all(),
            'psikologs' => Psikolog::all(),
            'jadwals' => Jadwal::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.konsultasi.create', [
            'title' => 'Buat konsultasi',
            'page' => 'konsultasi',
            'konsultasis' => Konsultasi::all(),
            'members' => Member::all(),
            'psikologs' => Psikolog::all(),
            'jadwals' => Jadwal::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
            'psikolog_id' => 'required',
            'keluhan' => 'required',
            'tanggal_konsultasi' => 'required',
            'jadwal_id' => 'required',
        ]);

        Konsultasi::create([
            'member_id' => $request->member_id,
            'psikolog_id' => $request->psikolog_id,
            'keluhan' => $request->keluhan,
            'booked_at' => date('Y-m-d H:i:s'),
            'tanggal_konsultasi' => $request->tanggal_konsultasi,
            'jadwal_id' => $request->jadwal_id,
            'status' => $request->status ?? 'booking diterima',
            // 'status' => 'booking diterima'
        ]);

        return redirect('/admin/konsultasi')->with('success', 'Data konsultasi ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Konsultasi $konsultasi)
    {
        return view('admin.konsultasi.show', [
            'title' => 'Detail konsultasi',
            'page' => 'konsultasi',
            'konsultasi' => $konsultasi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Konsultasi $konsultasi)
    {
        return view('admin.konsultasi.edit', [
            'title' => 'Detail konsultasi',
            'page' => 'konsultasi',
            'konsultasi' => $konsultasi,
            'members' => Member::all(),
            'psikologs' => Psikolog::all(),
            'jadwals' => Jadwal::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Konsultasi $konsultasi)
    {
        $request->validate([
            'member_id' => 'required',
            'psikolog_id' => 'required',
            'keluhan' => 'required',
            'tanggal_konsultasi' => 'required',
            'jadwal_id' => 'required',
            'status' => 'required',
        ]);


        $konsultasi->update([
            'member_id' => $request->member_id,
            'psikolog_id' => $request->psikolog_id,
            'keluhan' => $request->keluhan,
            'tanggal_konsultasi' => $request->tanggal_konsultasi,
            'jadwal_id' => $request->jadwal_id,
            'status' => $request->status
        ]);

        return redirect('/admin/konsultasi')->with('success', 'Data konsultasi diperbarui');
    }

    public function updateStatus(Request $request, Konsultasi $konsultasi)
    {
        $konsultasi->update([
            'status' => $request->status
        ]);

        if(!Pembayaran::where('konsultasi_id', $konsultasi->id)->exists()){
            Pembayaran::create([
                'konsultasi_id' => $konsultasi->id,
                'nominal' => '350000',
                'keterangan' => $request->keterangan,
            ]);
        }
        // if ($request->status == 'batal') {
        //     Pembayaran::where('konsultasi_id', $konsultasi->id)->delete();
        // }

        return back()->with('success', 'Booking Konsultasi berhasil dikonfirmasi');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(konsultasi $konsultasi)
    {
        $konsultasi->delete();
        return redirect('/admin/konsultasi')->with('success', 'Data konsultasi dihapus');
    }
}
