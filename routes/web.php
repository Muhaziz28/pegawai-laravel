<?php

use App\Http\Controllers\Hrd\DivisiController;
use App\Http\Controllers\Hrd\GradeController;
use App\Http\Controllers\Hrd\JabatanController;
use App\Http\Controllers\Hrd\LevelController;
use App\Http\Controllers\Hrd\LokasiController;
use App\Http\Controllers\HrdController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Node\CrapIndex;

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

Route::redirect('/', 'login');

Route::middleware(['middleware' => 'PreventBackHistory'])->group(function () {
    Auth::routes();
});


// ! Route 1 for Hrd
Route::group(['prefix' => 'hrd', 'middleware' => ['isHrd', 'auth', 'PreventBackHistory']], function () {
    Route::get('dashboard', [HrdController::class, 'index'])->name('hrd.dashboard');

    Route::get('divisi', [HrdController::class, 'divisi'])->name('hrd.divisi');
    Route::get('getDivisi', [DivisiController::class, 'getDivisi'])->name('hrd.getDivisi');
    Route::post('addDivisi', [DivisiController::class, 'addDivisi'])->name('hrd.addDivisi');
    Route::post('deleteDivisi', [DivisiController::class, 'deleteDivisi'])->name('hrd.deleteDivisi');
    Route::post('detailDivisi', [DivisiController::class, 'detailDivisi'])->name('hrd.detailDivisi');
    Route::post('updateDivisi', [DivisiController::class, 'updateDivisi'])->name('hrd.updateDivisi');

    Route::get('jabatan', [HrdController::class, 'jabatan'])->name('hrd.jabatan');
    Route::get('getJabatan', [JabatanController::class, 'getJabatan'])->name('hrd.getJabatan');
    Route::post('addJabatan', [JabatanController::class, 'addJabatan'])->name('hrd.addJabatan');
    Route::post('deleteJabatan', [JabatanController::class, 'deleteJabatan'])->name('hrd.deleteJabatan');
    Route::post('detailJabatan', [JabatanController::class, 'detailJabatan'])->name('hrd.detailJabatan');
    Route::post('updateJabatan', [JabatanController::class, 'updateJabatan'])->name('hrd.updateJabatan');

    Route::get('level', [HrdController::class, 'level'])->name('hrd.level');
    Route::get('getLevel', [LevelController::class, 'getLevel'])->name('hrd.getLevel');
    Route::post('addLevel', [LevelController::class, 'addLevel'])->name('hrd.addLevel');
    Route::post('detailLevel', [LevelController::class, 'detailLevel'])->name('hrd.detailLevel');
    Route::post('updateLevel', [LevelController::class, 'updateLevel'])->name('hrd.updateLevel');
    Route::post('deleteLevel', [LevelController::class, 'deleteLevel'])->name('hrd.deleteLevel');

    Route::get('grade', [HrdController::class, 'grade'])->name('hrd.grade');
    Route::get('getGrade', [GradeController::class, 'getGrade'])->name('hrd.getGrade');
    Route::post('addGrade', [GradeController::class, 'addGrade'])->name('hrd.addGrade');
    Route::post('detailGrade', [GradeController::class, 'detailGrade'])->name('hrd.detailGrade');
    Route::post('updateGrade', [GradeController::class, 'updateGrade'])->name('hrd.updateGrade');
    Route::post('deleteGrade', [GradeController::class, 'deleteGrade'])->name('hrd.deleteGrade');

    Route::get('lokasi', [HrdController::class, 'lokasi'])->name('hrd.lokasi');
    Route::get('getLokasi', [LokasiController::class, 'getLokasi'])->name('hrd.getLokasi');
    Route::post('addLokasi', [LokasiController::class, 'addLokasi'])->name('hrd.addLokasi');
    Route::post('detailLokasi', [LokasiController::class, 'detailLokasi'])->name('hrd.detailLokasi');
    Route::post('updateLokasi', [LokasiController::class, 'updateLokasi'])->name('hrd.updateLokasi');
    Route::post('deleteLokasi', [LokasiController::class, 'deleteLokasi'])->name('hrd.deleteLokasi');

    Route::get('pegawaiAktif', [HrdController::class, 'pegawaiAktif'])->name('hrd.pegawaiAktif');
});
