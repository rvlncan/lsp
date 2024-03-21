<?php
use App\Http\Controllers\DestinationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\PaketWisata;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    $paket_wisata = PaketWisata::orderBy('id','desc')->get();
    return view('welcome', [
    'paket_wisata' => $paket_wisata
]);
});
// Route::get('/', function () {
//     return redirect()->route('login');
// });
Route::get('/nonaktif', function () {
    return view('nonaktif');
});
Auth::routes();
Route::middleware(['auth', 'aktif'])->group(function () {

    Route::get('/user', [App\Http\Controllers\HomeController::class, 'user'])->name('user');
    Route::post('/user-tambah', [App\Http\Controllers\HomeController::class, 'user_tambah'])->name('user-tambah');
    Route::post('/user-update', [App\Http\Controllers\HomeController::class, 'user_update'])->name('user-update');
    Route::get('/user-delete/{id}', [App\Http\Controllers\HomeController::class, 'user_delete'])->name('user-delete');

    Route::get('/karyawan', [App\Http\Controllers\HomeController::class, 'karyawan'])->name('karyawan');
    Route::post('/karyawan-tambah', [App\Http\Controllers\HomeController::class, 'karyawan_tambah'])->name('karyawan-tambah');
    Route::post('/karyawan-update', [App\Http\Controllers\HomeController::class, 'karyawan_update'])->name('karyawan-update');
    Route::get('/karyawan-delete/{id}', [App\Http\Controllers\HomeController::class, 'karyawan_delete'])->name('karyawan-delete');

    Route::get('/reservasi', [App\Http\Controllers\HomeController::class, 'reservasi'])->name('reservasi');
    Route::post('/reservasi-tambah', [App\Http\Controllers\HomeController::class, 'reservasi_tambah'])->name('reservasi-tambah');
    Route::post('/reservasi-update', [App\Http\Controllers\HomeController::class, 'reservasi_update'])->name('reservasi-update');
    Route::get('/reservasi-delete/{id}', [App\Http\Controllers\HomeController::class, 'reservasi_delete'])->name('reservasi-delete');

    Route::get('/daftar_paket', [App\Http\Controllers\HomeController::class, 'daftar_paket'])->name('daftar_paket');
    Route::post('/daftar_paket-tambah', [App\Http\Controllers\HomeController::class, 'daftar_paket_tambah'])->name('daftar_paket-tambah');
    Route::post('/daftar_paket-update', [App\Http\Controllers\HomeController::class, 'daftar_paket_update'])->name('daftar_paket-update');
    Route::get('/daftar_paket-delete/{id}', [App\Http\Controllers\HomeController::class, 'daftar_paket_delete'])->name('daftar_paket-delete');

    Route::get('/paket_wisata', [App\Http\Controllers\HomeController::class, 'paket_wisata'])->name('paket_wisata');
    Route::post('/paket_wisata-tambah', [App\Http\Controllers\HomeController::class, 'paket_wisata_tambah'])->name('paket_wisata-tambah');
    Route::post('/paket_wisata-update', [App\Http\Controllers\HomeController::class, 'paket_wisata_update'])->name('paket_wisata-update');
    Route::get('/paket_wisata-delete/{id}', [App\Http\Controllers\HomeController::class, 'paket_wisata_delete'])->name('paket_wisata-delete');

    Route::get('/laporan', [App\Http\Controllers\HomeController::class, 'laporan'])->name('laporan');

    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::get('/profile_hapus_pp', [App\Http\Controllers\HomeController::class, 'profile_hapus_pp'])->name('profile_hapus_pp');
    Route::post('/profile', [App\Http\Controllers\HomeController::class, 'profile_update'])->name('profile');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/destination', [App\Http\Controllers\DestinationController::class, 'index'])->name('destination');
    Route::get('/welcome', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
});
