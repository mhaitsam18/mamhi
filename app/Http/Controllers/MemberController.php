<?php

namespace App\Http\Controllers;

use App\Models\Psikolog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    public function index()
    {
        return view('member.index', [
            'psikologs' => Psikolog::all(),
            'title' => 'Dashboard',
            'page' => 'index'
        ]);
    }
    public function tentangKami()
    {
        return view('member.tentang-kami', [
            'title' => 'Dashboard',
            'page' => 'tentang-kami'
        ]);
    }



    public function profile()
    {
        return view('member.profile', [
            'title' => 'Profile',
            'page' => 'profile',
            'profile' => User::find(auth()->user()->id)
        ]);
    }

    public function profileUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email,' . $request->id,
            'username' => 'required|string|unique:users,username,' . $request->id,
            'no_hp' => ['required', 'string', 'unique:users,no_hp,' . $request->id, 'regex:/^(?:\+62|0)[0-9\s-]+$/'],
            'name' => 'required|string',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'alamat' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
            // Atur aturan validasi lainnya di sini sesuai kebutuhan
        ]);

        // Jika validasi gagal, kembalikan respon dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('error', 'Terjadi kesalahan dalam pengisian formulir.')
                ->withInput();
        }

        // Proses update profil jika validasi berhasil
        $user = User::find($request->id);
        if (!$user) {
            // Jika data pengguna dengan ID tersebut tidak ditemukan, lakukan sesuatu (misalnya, redirect atau tampilkan pesan)
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }

        // Update data pengguna dengan data baru
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->tanggal_lahir = $request->input('tanggal_lahir');
        $user->no_hp = $request->input('no_hp');
        $user->jenis_kelamin = $request->input('jenis_kelamin');
        $user->alamat = $request->input('alamat');
        // Update kolom foto jika ada file gambar yang diunggah
        if ($request->hasFile('foto')) {
            // Proses penyimpanan file gambar, misalnya di folder public/images
            $path = $request->file('foto')->store('foto-profil');
            $user->foto = $path;
        }
        // Simpan perubahan data pengguna
        $user->save();

        // Set pesan sukses dan kembalikan respon dengan redirect ke halaman profil atau pesan sukses
        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}