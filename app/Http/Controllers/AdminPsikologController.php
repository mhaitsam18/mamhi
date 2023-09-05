<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\Konsultasi;
use App\Models\Psikolog;
use App\Models\Psikotes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminPsikologController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.psikolog.index', [
            'title' => 'MAMHI | Data Psikolog',
            'page' => 'psikolog',
            'psikologs' => Psikolog::all(),
        ]);
    }

    public function kelola()
    {
        return view('admin.psikolog.index-admin', [
            'title' => 'MAMHI | Data Psikolog',
            'page' => 'psikolog',
            'psikologs' => Psikolog::all(),
        ]);
    }

    public function create()
    {
        return view('admin.psikolog.create',  [
            'title' => 'Tambah psikolog',
            'page' => 'psikolog',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'username' => 'required|unique:users',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'jenis_keahlian' => 'required',
            'kode_psikolog' => 'required|unique:psikolog',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'foto' => $request->nama_foto,
            'role' => 'psikolog',
        ]);
        Psikolog::create([
            'user_id' => $user->id,
            'jenis_keahlian' => $request->jenis_keahlian,
            'kode_psikolog' => $request->kode_psikolog,
        ]);

        return redirect('/admin/psikolog')->with('success', 'Data psikolog ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Psikolog $psikolog)
    {
        return view('admin.psikolog.show',  [
            'title' => 'Detail psikolog',
            'page' => 'psikolog',
            'psikolog' => $psikolog,
            'konsultasis' => Konsultasi::where('psikolog_id', $psikolog->id)->get(),
            'psikotess' => Psikotes::where('psikolog_id', $psikolog->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Psikolog $psikolog)
    {

        return view('admin.psikolog.edit', [
            'title' => 'MAMHI | Data Psikolog',
            'page' => 'psikolog',
            'psikolog' => $psikolog,
            'konsultasis' => Konsultasi::where('psikolog_id', $psikolog->id)->get(),
            'psikotess' => Psikotes::where('psikolog_id', $psikolog->id)->get(),
        ]);
    }

    public function updatePhoto(Request $request, User $user)
    {
        $user->update([
            'foto' => $request->nama_foto
        ]);
        return back()->with('success', 'Foto Berhasil diperbarui');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Psikolog $psikolog)
    {
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email:dns',
                Rule::unique('users')->ignore($psikolog->user_id),
            ],
            'username' => [
                'required',
                Rule::unique('users')->ignore($psikolog->user_id),
            ],
            'tanggal_lahir' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'kode_psikolog' => [
                'required',
                Rule::unique('psikolog')->ignore($psikolog->id),
            ],
            'jenis_keahlian' => 'required',
        ]);
        $psikolog->update([
            'kode_psikolog' => $request->kode_psikolog,
            'keahlian' => $request->keahlian,
        ]);

        $user = User::find($psikolog->user_id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
        ]);
        return back()->with('success', 'Data Psikolog diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Psikolog $psikolog)
    {
        $psikolog->delete();
        return back()->with('success', 'Data psikolog dihapus');
    }
}
