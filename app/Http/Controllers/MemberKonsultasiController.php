<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MemberKonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('member.konsultasi.index', [
            'title' => 'MAMHI | konsultasi',
            'page' => 'konsultasi',
        ]);
    }
    
    public function list()
    {
        return view('member.konsultasi.list', [
            'title' => 'MAMHI | konsultasi',
            'page' => 'konsultasi',
            'konsultasis' => Konsultasi::where('member_id', auth()->user()->member->id)->get(),
        ]);
    }
    
    public function pilihTanggal()
    {
        return view('member.konsultasi.pilih-tanggal', [
            'title' => 'MAMHI | konsultasi',
            'page' => 'konsultasi',
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
        // Validasi data input dari form jika diperlukan
        $validator = Validator::make($request->all(), [
            'member_id' => 'required',
            'psikolog_id' => 'required',
            'jadwal_id' => 'required',
            'tanggal' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('error', 'Terjadi kesalahan.')
                ->withInput();
        }
        $konsultasi = Konsultasi::create([
            'member_id' => $request->member_id,
            'psikolog_id' => $request->psikolog_id,
            'keluhan' => $request->keluhan,
            'booked_at' => now(),
            'tanggal_konsultasi' => $request->tanggal,
            'jadwal_id' => $request->jadwal_id,
            'status' => 'booking',
        ]);

        // Lakukan operasi lainnya sesuai kebutuhan
        // ...

        // Setelah proses berhasil, redirect atau tampilkan pesan sukses
        if ($konsultasi) {
            return redirect()->route('member.konsultasi.tagihan', ['konsultasi' => $konsultasi->id])->with('success', 'Booking berhasil.');
        } else{
            return redirect()->back()->with('error', 'Terjadi kesalahan.');
        }
    }
    public function tagihan(Konsultasi $konsultasi)
    {
        return view('member.konsultasi.tagihan', [
            'title' => 'MAMHI | Tagihan',
            'page' => 'konsultasi',
            'konsultasi' => $konsultasi,
            'pembayaran' => Pembayaran::where('konsultasi_id', $konsultasi->id)->first(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Konsultasi $konsultasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Konsultasi $konsultasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Konsultasi $konsultasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Konsultasi $konsultasi)
    {
        //
    }
}
