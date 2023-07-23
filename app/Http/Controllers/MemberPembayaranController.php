<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MemberPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Validasi data input dari form
        $validator = Validator::make($request->all(), [
            'bukti' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Jika validasi gagal, kembalikan respon dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if ($request->hasFile('bukti')) {
            // Proses penyimpanan file gambar, misalnya di folder public/images
            $path = $request->file('bukti')->store('bukti-pembayaran');
            $bukti = $path;
        } else{
            $bukti = '';
        }
        Pembayaran::create([
            'konsultasi_id' => $request->konsultasi_id,
            'psikotes_id' => $request->psikotes_id,
            'nominal' => $request->nominal,
            'bukti' => $bukti,
        ]);
        return redirect()->route('member.konsultasi.konsultasi-saya')->with('success', 'Bukti Transfer berhasil dikirim.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
