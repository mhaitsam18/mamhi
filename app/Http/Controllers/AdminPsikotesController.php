<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\JenisPsikotes;
use App\Models\Member;
use App\Models\Psikolog;
use App\Models\Psikotes;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPsikotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.psikotes.index', [
            'title' => 'List psikotes',
            'page' => 'psikotes',
            'jenis_psikotess' => JenisPsikotes::all(),
            'psikotess' => Psikotes::all(),
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
        return view('admin.psikotes.create', [
            'title' => 'Buat psikotes',
            'page' => 'psikotes',
            'psikotess' => Psikotes::all(),
            'jenis_psikotess' => JenisPsikotes::all(),
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
            'nomor_peserta' => 'unique:psikotes',
            'tanggal_psikotes' => 'required',
            'jenis_psikotes_id' => 'required',
            'kebutuhan' => 'required',
            'jadwal_id' => 'required',
        ]);

        psikotes::create([
            'member_id' => $request->member_id,
            'psikolog_id' => $request->psikolog_id,
            'nomor_peserta' => $request->nomor_peserta,
            'booked_at' => date('Y-m-d H:i:s'),
            'tanggal_psikotes' => $request->tanggal_psikotes,
            'jenis_psikotes_id' => $request->jenis_psikotes_id,
            'kebutuhan' => $request->kebutuhan,
            'jadwal_id' => $request->jadwal_id,
            'status' => $request->status
        ]);

        return redirect('/admin/psikotes')->with('success', 'Data psikotes ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(psikotes $psikotes)
    {
        return view('admin.psikotes.show', [
            'title' => 'Detail psikotes',
            'page' => 'psikotes',
            'psikotes' => $psikotes,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(psikotes $psikotes)
    {
        return view('admin.psikotes.edit', [
            'title' => 'Detail psikotes',
            'page' => 'psikotes',
            'psikotes' => $psikotes,
            'members' => Member::all(),
            'psikologs' => Psikolog::all(),
            'jadwals' => Jadwal::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, psikotes $psikotes)
    {
        $request->validate([
            'member_id' => 'required',
            'psikolog_id' => 'required',
            'nomor_peserta' => [
                'nullable', // Memungkinkan nomor_peserta kosong (NULL)
                Rule::unique('psikotes')->ignore($psikotes->id), // $psikotes->id adalah ID data yang sedang diedit
            ],
            'tanggal_psikotes' => 'required',
            'jenis_psikotes_id' => 'required',
            'kebutuhan' => 'required',
            'jadwal_id' => 'required',
            'status' => 'required',
        ]);


        $psikotes->update([
            'member_id' => $request->member_id,
            'psikolog_id' => $request->psikolog_id,
            'nomor_peserta' => $request->nomor_peserta,
            'tanggal_psikotes' => $request->tanggal_psikotes,
            'jenis_psikotes_id' => $request->jenis_psikotes_id,
            'kebutuhan' => $request->kebutuhan,
            'jadwal_id' => $request->jadwal_id,
            'status' => $request->status
        ]);

        return redirect('/admin/psikotes')->with('success', 'Data psikotes diperbarui');
    }

    public function updateStatus(Request $request, Psikotes $psikotes)
    {
        $psikotes->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Booking psikotes berhasil dikonfirmasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(psikotes $psikotes)
    {
        $psikotes->delete();
        return redirect('/admin/psikotes')->with('success', 'Data psikotes dihapus');
    }
}
