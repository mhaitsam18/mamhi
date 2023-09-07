<?php

namespace App\Http\Controllers;

use App\Models\JenisPsikotes;
use App\Models\Pembayaran;
use App\Models\Psikolog;
use App\Models\Psikotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            'jenis_psikotess' => JenisPsikotes::all(),
        ]);
    }

    public function list()
    {
        return view('member.psikotes.list', [
            'title' => 'MAMHI | psikotes',
            'page' => 'psikotes',
            'psikotess' => Psikotes::where('member_id', auth()->user()->member->id)->get(),
            'jenis_psikotess' => JenisPsikotes::all(),
        ]);
    }

    public function pilihTanggal()
    {
        return view('member.psikotes.pilih-tanggal', [
            'title' => 'MAMHI | psikotes',
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

        $bulan_peserta_daftar = date('m'); // Ambil bulan saat ini
        $tahun_peserta_daftar = date('Y'); // Ambil tahun saat ini

        $kode_psikolog = Psikolog::find($request->psikolog_id)->kode_psikolog;
        // Hitung jumlah peserta pada bulan dan tahun tertentu
        $jumlah_peserta = Psikotes::whereMonth('booked_at', $bulan_peserta_daftar)
        ->whereYear('booked_at', $tahun_peserta_daftar)
        ->count();

        $angka_romawi_bulan = $this->angkaRomawi(date('m'));

        $nomor_peserta = sprintf(
            "%02d/%s-MAMHI/%s/%s/%s",
            $jumlah_peserta + 1,
            $kode_psikolog,
            $angka_romawi_bulan,
            $tahun_peserta_daftar,
            // Argumen keenam diisi dengan nilai kosong ('')
            ''
        );

        $psikotes = Psikotes::create([
            'member_id' => $request->member_id,
            'nomor_peserta' => $nomor_peserta,
            'psikolog_id' => $request->psikolog_id,
            'kebutuhan' => $request->kebutuhan,
            'jenis_psikotes_id' => $request->jenis_psikotes_id,
            'booked_at' => now(),
            'tanggal_psikotes' => $request->tanggal,
            'jadwal_id' => $request->jadwal_id,
            'status' => 'booking',
        ]);

        // Lakukan operasi lainnya sesuai kebutuhan
        // ...

        // Setelah proses berhasil, redirect atau tampilkan pesan sukses
        if ($psikotes) {
            return redirect()->route('member.psikotes.tagihan', ['psikotes' => $psikotes->id])->with('success', 'Booking berhasil.');
        } else{
            return redirect()->back()->with('error', 'Terjadi kesalahan.');
        }
    }

    private function angkaRomawi($angka)
    {
        $romawi = array('', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII');
        if (substr($angka, 0, 1) === '0') {
            $angka = substr($angka, 1);
        }
        return $romawi[$angka];
    }

    public function tagihan(Psikotes $psikotes)
    {
        return view('member.psikotes.tagihan', [
            'title' => 'MAMHI | Tagihan',
            'page' => 'psikotes',
            'psikotes' => $psikotes,
            'pembayaran' => Pembayaran::where('psikotes_id', $psikotes->id)->first(),
        ]);
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
