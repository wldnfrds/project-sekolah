<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\LandingPage\HomeController;
use App\Http\Controllers\LandingPage\JurusanController;
use App\Http\Controllers\Ppdb\PpdbController;
use App\Http\Controllers\TestimoniController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'beranda'])->name('beranda');

Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang');
Route::get('/guru', [HomeController::class, 'guru'])->name('guru');
Route::get('/berita', [HomeController::class, 'acara'])->name('acara');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
Route::post('/kontak', [HomeController::class, 'store'])->name('contact.store');

Route::get('/berita/{id}', [HomeController::class, 'show'])->name('news.show');

Route::group(['prefix' => 'jurusan'], function () {
    Route::get('/rekayasa-perangkat-lunak', [JurusanController::class, 'rpl'])->name('rpl');
    Route::get('/teknik-kendaraan-ringan', [JurusanController::class, 'tkr'])->name('tkr');
    Route::get('/bisnis-daring-dan-pemasaran', [JurusanController::class, 'bdp'])->name('bdp');
});






Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register'); // Perbaikan untuk showRegisterForm
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('/syarat-pendaftaran', [PpdbController::class, 'syarat'])->name('syarat');

Route::get('/pendaftaran', [PpdbController::class, 'index'])->name('ppdb')->middleware('auth');
Route::post('/pendaftaran', [PpdbController::class, 'store'])->name('registration.store');

Route::get('/siswa/notifikasi', [HomeController::class, 'dashboard'])->name('student.dashboard')->middleware('auth');

Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni');
Route::post('/testimoni', [TestimoniController::class, 'store'])->name('testimoni.store');

Route::get('/siswa/dashboard', [HomeController::class, 'sisdash'])->name('sisdash');

Route::post('/subscribe', [HomeController::class, 'subscribe'])->name('subscribe');
