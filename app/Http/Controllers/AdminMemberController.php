<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\Konsultasi;
use App\Models\Member;
use App\Models\Psikotes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
class AdminMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.member.index',  [
            'title' => 'Data Member',
            'page' => 'member',
            'data_member' => Member::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.member.create',  [
            'title' => 'Tambah Member',
            'page' => 'member',
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
            'pekerjaan' => 'required',
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
            'password' => $request->password,
            'foto' => $request->nama_foto,
            'role' => 'member',
        ]);
        Member::create([
            'user_id' => $user->id,
            'pekerjaan' => $request->pekerjaan,
        ]);
        
        return redirect('/admin/member')->with('success', 'Data member ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        return view('admin.member.show',  [
            'title' => 'Detail member',
            'page' => 'member',
            'member' => $member,
            'konsultasis' => Konsultasi::where('member_id', $member->id)->get(),
            'psikotess' => Psikotes::where('member_id', $member->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('admin.member.edit', [
            'title' => 'MAMHI | Edit member',
            'page' => 'member',
            'member' => $member,
            'konsultasis' => Konsultasi::where('member_id', $member->id)->get(),
            'psikotess' => Psikotes::where('member_id', $member->id)->get(),
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
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email:dns',
                Rule::unique('users')->ignore($member->user_id),
            ],
            'username' => [
                'required',
                Rule::unique('users')->ignore($member->user_id),
            ],
            'tanggal_lahir' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
        ]);
        $member->update([
            'pekerjaan' => $request->pekerjaan,
        ]);

        $user = User::find($member->user_id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
        ]);
        return back()->with('success', 'Data member diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return back()->with('success', 'Data member dihapus');
    }


    public function tmpUpload(Request $request)
    {
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $file_name = $image->getClientOriginalName();
            $file_name = $request->file('foto')->store('foto-profil');
            return $file_name;
        }
        return '';
    }
    public function tmpDelete(Request $request)
    {
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $file_name = $image->getClientOriginalName();
            $file_name = $request->file('foto')->store('foto-profil');
            return $file_name;
        }
        return '';
    }
}
