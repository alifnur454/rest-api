<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PengaturansistemController;
use App\Http\Controllers\PengurangansaldoController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\Pengaturan_umumController;
use App\Http\Controllers\HeaderfooterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/produk',[ProdukController::class,'index']);
Route::get('/produk/{id}',[ProdukController::class,'cari']);
Route::get('/produk/cari/{nama}',[ProdukController::class,'carinama']);
Route::post('/produk/tambah',[ProdukController::class,'tambah']);
Route::put('/produk/edit/{id}',[ProdukController::class,'ubah']);
Route::delete('/produk/delete/{id}',[ProdukController::class,'hapus']);
Route::delete('/produk/restore/{id}',[ProdukController::class,'restore']);

Route::get('/produk/all', [ProdukController::class,'all']);

Route::get('/produk', [ProdukController::class,'index']);
Route::get('/produk/{id}', [ProdukController::class,'search']);
Route::get('/produk/cari/{nama}',[ProdukController::class,'aw']);
Route::post('/produk/tambah',[ProdukController::class,'create']);
Route::put('/produk/ubah/{id}', [ProdukController::class,'update']);
Route::delete('/produk/hapus/{id}', [ProdukController::class,'delete']);
Route::delete('/produk/restore/{id}', [ProdukController::class,'restore']);


Route::get('/pengaturansistem/all', [PengaturansistemController::class,'all']);

Route::get('/pengaturansistem', [PengaturansistemController::class,'index']);
Route::get('/pengaturansistem/{id}', [PengaturansistemController::class,'search']);
Route::get('/pengaturansistem/cari/{nama}',[PengaturansistemController::class,'aw']);
Route::post('/pengaturansistem/tambah',[PengaturansistemController::class,'create']);
Route::put('/pengaturansistem/ubah/{id}', [PengaturansistemController::class,'update']);
Route::delete('/pengaturansistem/hapus/{id}', [PengaturansistemController::class,'delete']);
Route::delete('/pengaturansistem/restore/{id}', [PengaturansistemController::class,'restore']);

Route::get('/supplier', [SupplierController::class,'index']);
Route::get('/supplier/{id}', [SupplierController::class,'search']);
Route::get('/supplier/cari/{nama}',[SupplierController::class,'aw']);
Route::post('/supplier/tambah',[SupplierController::class,'create']);
Route::put('/supplier/ubah/{id}', [SupplierController::class,'update']);
Route::delete('/supplier/hapus/{id}', [SupplierController::class,'delete']);
Route::delete('/supplier/restore/{id}', [SupplierController::class,'restore']);

Route::get('/pengurangansaldo', [PengurangansaldoController::class,'index']);
Route::get('/pengurangansaldo/{id}', [PengurangansaldoController::class,'search']);
Route::get('/pengurangansaldo/cari/{nama}',[PengurangansaldoController::class,'aw']);
Route::post('/pengurangansaldo/tambah',[PengurangansaldoController::class,'create']);
Route::put('/pengurangansaldo/ubah/{id}', [PengurangansaldoController::class,'update']);
Route::delete('/pengurangansaldo/hapus/{id}', [PengurangansaldoController::class,'delete']);
Route::delete('/pengurangansaldo/restore/{id}', [PengurangansaldoController::class,'restore']);

Route::get('/pengaturan_umum', [Pengaturan_umumController::class,'index']);
Route::get('/pengaturan_umum/{id}', [Pengaturan_umumController::class,'search']);
Route::get('/pengaturan_umum/cari/{nama}',[Pengaturan_umumController::class,'aw']);
Route::post('/pengaturan_umum/tambah',[Pengaturan_umumController::class,'create']);
Route::put('/pengaturan_umum/ubah/{id}', [Pengaturan_umumController::class,'update']);
Route::delete('/pengaturan_umum/hapus/{id}', [Pengaturan_umumController::class,'delete']);
Route::delete('/pengaturan_umum/restore/{id}', [Pengaturan_umumController::class,'restore']);

Route::get('/headerfooter', [HeaderfooterController::class,'index']);
Route::get('/headerfooter/{id}', [HeaderfooterController::class,'search']);
Route::get('/headerfooter/cari/{nama}',[HeaderfooterController::class,'aw']);
Route::post('/headerfooter/tambah',[HeaderfooterController::class,'create']);
Route::put('/headerfooter/ubah/{id}', [HeaderfooterController::class,'update']);
Route::delete('/headerfooter/hapus/{id}', [HeaderfooterController::class,'delete']);
Route::delete('/headerfooter/restore/{id}', [HeaderfooterController::class,'restore']);



// Route::get('/coba',function ()
// {
    //   echo "api";
    // });

// Route::post('/produk/tambah/{nama}/{kode}/{unit}/{harga_dasar}/{harga_jual}/{keterangan}/{berat}/{status_olshop}/{status_penjualan}/{status_pembelian}/{kategori_id}/{total_stock}', [ProdukController::class,'create']);
// Route::put('/produk/ubah/{id}/{nama}/{kode}/{unit}/{harga_dasar}/{harga_jual}/{keterangan}/{berat}/{status_olshop}/{status_penjualan}/{status_pembelian}/{kategori_id}/{total_stock}', [ProdukController::class,'update']);
// Route::delete('/produk/hapus/{id}', [ProdukController::class,'delete']);
// Route::delete('/produk/restore/{id}', [ProdukController::class,'restore']);
