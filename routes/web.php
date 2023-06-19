<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminJadwalController;
use App\Http\Controllers\AdminKonsultasiController;
use App\Http\Controllers\AdminMemberController;
use App\Http\Controllers\AdminPsikologController;
use App\Http\Controllers\AdminPsikotesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
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


Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('index');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('store');
    
    
    
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('get.logout');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', [AdminController::class, 'index'])->name('admin');
            Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
            Route::get('/index', [AdminController::class, 'index'])->name('admin.index');
            Route::get('/jadwal', [AdminJadwalController::class, 'index'])->name('admin.jadwal');
            Route::get('/jadwal-praktik', [AdminJadwalController::class, 'jadwalPraktik'])->name('admin.jadwal-praktik');
            Route::get('/hasil', [AdminController::class, 'hasil'])->name('admin.hasil');
            Route::get('/psikolog', [AdminPsikologController::class, 'index'])->name('admin.psikolog');
            Route::get('/member', [AdminMemberController::class, 'index'])->name('admin.member');
            Route::get('/konsultasi', [AdminKonsultasiController::class, 'index'])->name('admin.konsultasi');
            Route::get('/psikotes', [AdminPsikotesController::class, 'index'])->name('admin.psikotes');
        });
    });
    Route::middleware('member')->group(function () {
        Route::prefix('member')->group(function () {
            Route::get('/', [MemberController::class, 'index'])->name('member.index');
            Route::get('/profile', [MemberController::class, 'profile'])->name('member.profile');
        });
    });
    Route::middleware('psikolog')->group(function () {
        Route::prefix('psikolog')->group(function () {
            Route::get('/', [PsikologController::class, 'index'])->name('psikolog.index');
        });
    });
    
});