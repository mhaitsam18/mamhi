<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Konsultasi;
use App\Models\Psikotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;


class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function pilihJadwal(Request $request)
    {
        $hari = $this->cekhari($request->tanggal);
        $jadwals = Jadwal::where('hari', $hari)->where('status', 'Tersedia')->get();
        $jadwal_tersedia = [];

        foreach ($jadwals as $jadwal) {
            $cek_psikotes = Psikotes::where('tanggal_psikotes', $request->tanggal)->where('jadwal_id', $jadwal->id)->exists();
            $cek_konsultasi = Konsultasi::where('tanggal_konsultasi', $request->tanggal)->where('jadwal_id', $jadwal->id)->exists();

            if (!$cek_psikotes && !$cek_konsultasi) {
                // Tambahkan data jadwal ke dalam array $jadwal_tersedia
                $jadwal_tersedia[] = $jadwal;
            }
        }

        // Ambil konten dari view partial_view.blade.php
        $content = View::make('jadwal.pilih-jadwal', [
            'jadwals' => $jadwal_tersedia,
            'aktor' => Auth::user()->role,
            'member_id' => $request->member_id,
            'aksi' => $request->aksi,
            'keluhan' => $request->keluhan,
            'kebutuhan' => $request->kebutuhan,
            'jenis_psikotes_id' => $request->jenis_psikotes_id,
            'tanggal' => $request->tanggal,
        ])->render();

        // Kirimkan konten dalam bentuk JSON sebagai respons
        return response()->json(['content' => $content]);
    }

    private function cekhari($tanggal)
    {
        // Mengubah tanggal ke format hari
        $dayOfWeek = date('l', strtotime($tanggal));

        // Mengubah hari menjadi bahasa Indonesia (opsional)
        $hariIndonesia = '';
        switch ($dayOfWeek) {
            case 'Sunday':
                $hariIndonesia = 'Minggu';
                break;
            case 'Monday':
                $hariIndonesia = 'Senin';
                break;
            case 'Tuesday':
                $hariIndonesia = 'Selasa';
                break;
            case 'Wednesday':
                $hariIndonesia = 'Rabu';
                break;
            case 'Thursday':
                $hariIndonesia = 'Kamis';
                break;
            case 'Friday':
                $hariIndonesia = 'Jumat';
                break;
            case 'Saturday':
                $hariIndonesia = 'Sabtu';
                break;
            default:
                $hariIndonesia = 'Tidak diketahui';
                break;
        }
        return $hariIndonesia;
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
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        //
    }
}
