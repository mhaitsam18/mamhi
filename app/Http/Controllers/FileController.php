<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class FileController extends Controller
{
    public function tmpUpload(Request $request)
    {
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $file_name = $image->getClientOriginalName();
            $file_name = $request->file('foto')->store($request->input('folder'));
            $request->session()->put('file_name', $file_name);
            return $file_name;
        }
        return '';
    }
    public function tmpDelete(Request $request)
    {
        $filePath = Session::get('file_name'); // Mendapatkan path file dari request
        if ($filePath) {
            // Hapus file dari storage
            Storage::delete($filePath);
            Session::forget('file_name');
            // Mengembalikan respon sesuai kebutuhan Anda, misalnya:
            return '';
        }
        // Mengembalikan respon sesuai kebutuhan Anda, misalnya:
        return $filePath;

    }
}
