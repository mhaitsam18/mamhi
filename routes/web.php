<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDiagnosisController;
use App\Http\Controllers\AdminJadwalController;
use App\Http\Controllers\AdminKomponenNilaiController;
use App\Http\Controllers\AdminKonsultasiController;
use App\Http\Controllers\AdminMemberController;
use App\Http\Controllers\AdminPsikologController;
use App\Http\Controllers\AdminPsikotesController;
use App\Http\Controllers\AdminRuanganController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberArtikelController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MemberJadwalController;
use App\Http\Controllers\MemberKonsultasiController;
use App\Http\Controllers\MemberPembayaranController;
use App\Http\Controllers\MemberPodcastController;
use App\Http\Controllers\MemberPsikologController;
use App\Http\Controllers\MemberPsikotesController;
use App\Http\Controllers\PsikologController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'index'])->name('index');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('store');



    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('get.logout');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::post('/file/tmp-upload', [FileController::class, 'tmpUpload'])->name('tmp-upload');
    Route::delete('/file/tmp-delete', [FileController::class, 'tmpDelete'])->name('tmp-delete');

    Route::post('/file/dokumen-upload', [FileController::class, 'dokumenUpload'])->name('dokumen-upload');
    Route::delete('/file/dokumen-delete', [FileController::class, 'dokumenDelete'])->name('dokumen-delete');

    Route::put('update-photo/{user}', [AuthController::class, 'updatePhoto'])->name('admin.psikolog-update-foto');
    Route::middleware('admin')->group(function () {
        Route::prefix('admin')->group(function () {

            Route::get('/', [AdminController::class, 'index'])->name('admin');
            Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
            Route::put('/profile', [AdminController::class, 'profileUpdate'])->name('admin.profile.update');
            Route::get('/index', [AdminController::class, 'index'])->name('admin.index');
            Route::resource('jadwal', AdminJadwalController::class);
            Route::put('psikolog/update-photo/{user}', [AdminPsikologController::class, 'updatePhoto'])->name('admin.psikolog-update-foto');
            Route::resource('psikolog', AdminPsikologController::class);
            Route::post('/member/tmp-upload', [AdminMemberController::class, 'tmpUpload'])->name('mmember-tmp-upload');
            Route::delete('/member/tmp-delete', [AdminMemberController::class, 'tmpDelete'])->name('member-tmp-delete');
            Route::resource('member', AdminMemberController::class);
            Route::put('member/update-photo/{user}', [AdminPsikologController::class, 'updatePhoto'])->name('admin.psikolog-update-foto');
            // Route::get('/jadwal', [AdminJadwalController::class, 'index'])->name('admin.jadwal');
            // Route::get('/psikolog', [AdminPsikologController::class, 'index'])->name('admin.psikolog');
            // Route::get('/member', [AdminMemberController::class, 'index'])->name('admin.member');
            Route::get('/jadwal-praktik', [AdminJadwalController::class, 'jadwalPraktik'])->name('admin.jadwal-praktik');
            Route::get('/hasil', [AdminController::class, 'hasil'])->name('admin.hasil');


            Route::get('/konsultasi/diagnosis/{konsultasi}', [AdminDiagnosisController::class, 'konsultasi'])->name('admin.psikolog-update-foto');
            Route::get('/konsultasi', [AdminKonsultasiController::class, 'index'])->name('admin.konsultasi');
            Route::resource('konsultasi', AdminKonsultasiController::class);
            Route::get('/psikotes', [AdminPsikotesController::class, 'index'])->name('admin.psikotes');
            
            
            
            Route::resource('ruangan', AdminRuanganController::class);
            Route::resource('komponen-nilai', AdminKomponenNilaiController::class);

            Route::prefix('diagnosis')->group(function () {
                Route::get('/', [AdminDiagnosisController::class, 'index'])->name('admin.diagnosis.index');
                Route::post('/', [AdminDiagnosisController::class, 'store'])->name('admin.diagnosis.store');
                Route::put('/{diagnosis}', [AdminDiagnosisController::class, 'update'])->name('admin.diagnosis.store');
            });
            // Route::resource('diagnosis', AdminDiagnosisController::class);

        });
    });
    Route::middleware('member')->group(function () {
        Route::prefix('member')->group(function () {
            Route::get('/', [MemberController::class, 'index'])->name('member.index');
            Route::get('/index', [MemberController::class, 'index'])->name('member.index');
            Route::get('/profile', [MemberController::class, 'profile'])->name('member.profile');
            Route::put('/profile', [AdminController::class, 'profileUpdate'])->name('member.profile.update');
            Route::get('/tentang-kami', [MemberController::class, 'tentangKami'])->name('member.tentang-kami.index');
            Route::get('/psikolog-kami', [MemberPsikologController::class, 'index'])->name('member.psikolog-kami.index');
            Route::get('/psikolog/{psikolog}', [MemberPsikologController::class, 'show'])->name('member.psikolog.show');
            Route::prefix('psikotes')->group(function () {
                Route::get('/', [MemberPsikotesController::class, 'index'])->name('member.psikotes.index');
                Route::get('/psikotes-saya', [MemberPsikotesController::class, 'list'])->name('member.psikotes.psikotes-saya');
                Route::get('/pilih-tanggal', [MemberPsikotesController::class, 'pilihTanggal'])->name('member.psikotes.pilih-tanggal');
                Route::post('/', [MemberPsikotesController::class, 'store'])->name('member.psikotes.store');
                Route::get('/tagihan/{psikotes}', [MemberPsikotesController::class, 'tagihan'])->name('member.psikotes.tagihan');
            });
            Route::prefix('konsultasi')->group(function () {
                Route::get('/', [MemberKonsultasiController::class, 'index'])->name('member.konsultasi.index');
                Route::get('/konsultasi-saya', [MemberKonsultasiController::class, 'list'])->name('member.konsultasi.konsultasi-saya');
                Route::get('/pilih-tanggal', [MemberKonsultasiController::class, 'pilihTanggal'])->name('member.konsultasi.pilih-tanggal');
                Route::post('/', [MemberKonsultasiController::class, 'store'])->name('member.konsultasi.store');
                Route::get('/tagihan/{konsultasi}', [MemberKonsultasiController::class, 'tagihan'])->name('member.konsultasi.tagihan');
            });
            Route::prefix('pembayaran')->group(function () {
                Route::get('/', [MemberPembayaranController::class, 'index'])->name('member.pembayaran.index');
                Route::post('/', [MemberPembayaranController::class, 'store'])->name('member.pembayaran.store');
            });
            
            Route::prefix('jadwal')->group(function () {
                Route::get('/', [MemberJadwalController::class, 'index'])->name('member.jadwal.index');
                Route::post('/pilih-jadwal', [MemberJadwalController::class, 'pilihJadwal'])->name('member.jadwal.pilih-jadwal');
            });
            Route::prefix('podcast')->group(function () {
                Route::get('/', [MemberPodcastController::class, 'index'])->name('member.podcast.index');
            });
            Route::prefix('podcast')->group(function () {
                Route::get('/', [MemberPodcastController::class, 'index'])->name('member.podcast.index');
            });
            Route::prefix('psikolog')->group(function () {
                Route::get('/', [MemberPsikologController::class, 'index'])->name('member.psikolog.index');
            });
            Route::prefix('artikel')->group(function () {
                Route::get('/', [MemberArtikelController::class, 'index'])->name('member.artikel.index');
                Route::get('/{artikel}', [MemberArtikelController::class, 'show'])->name('member.artikel.index');
            });
        });
        
    });
    Route::middleware('psikolog')->group(function () {
        Route::prefix('psikolog')->group(function () {
            Route::get('/', [PsikologController::class, 'index'])->name('psikolog.index');
        });
    });
});
