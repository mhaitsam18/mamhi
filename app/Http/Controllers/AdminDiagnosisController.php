<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminDiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    
    /**
     * Display a listing of the resource.
     */
    public function konsultasi(Konsultasi $konsultasi)
    {
        return view('admin.konsultasi.diagnosis',  [
            'title' => 'Data Diagnosis',
            'page' => 'diagnosis',
            'konsultasi' => $konsultasi,
            'diagnosis' => Diagnosis::where('konsultasi_id', $konsultasi->id)->first(),
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
        $validator = Validator::make($request->all(), 
            [
                'konsultasi_id' => 'required',
                'nomor_rekam_psikolog' => 'required',
                'hasil_diagnosis' => 'required',
                'nama_dokumen' => 'required'
            ],
            [
                'nama_dokumen.required' => 'Dokumen wajib diupload.',
            ]
        );
        if ($request->id) {
            Diagnosis::find($request->id)->update([
                'konsultasi_id' => $request->konsultasi_id,
                'nomor_rekam_psikolog' => $request->nomor_rekam_psikolog,
                'hasil_diagnosis' => $request->hasil_diagnosis,
                'dokumen' => $request->nama_dokumen,
            ]);
        } else {
            Diagnosis::create([
                'konsultasi_id' => $request->konsultasi_id,
                'nomor_rekam_psikolog' => $request->nomor_rekam_psikolog,
                'hasil_diagnosis' => $request->hasil_diagnosis,
                'dokumen' => $request->nama_dokumen,
            ]);
        }

        return redirect()->back()->with('success', 'Dokumen Rekam Psikolog telah disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Diagnosis $diagnosis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diagnosis $diagnosis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diagnosis $diagnosis)
    {
        dd($diagnosis->id);
        // Validasi data input dari form jika diperlukan
        $validator = Validator::make(
            $request->all(),
            [
                'konsultasi_id' => 'required',
                'nomor_rekam_psikolog' => 'required',
                'hasil_diagnosis' => 'required',
                'nama_dokumen' => 'required'
            ],
            [
                'nama_dokumen.required' => 'Dokumen wajib diupload.',
            ]
        );
        Diagnosis::find($diagnosis->id)->update([
            'konsultasi_id' => $request->konsultasi_id,
            'nomor_rekam_psikolog' => $request->nomor_rekam_psikolog,
            'hasil_diagnosis' => $request->hasil_diagnosis,
            'dokumen' => $request->nama_dokumen,
        ]);

        return redirect()->back()->with('success', 'Dokumen Rekam Psikolog telah disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diagnosis $diagnosis)
    {
        //
    }
}
