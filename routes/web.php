<?php

use App\Http\Controllers\Hrd\ActivityController;
use App\Http\Controllers\Hrd\DivisiController;
use App\Http\Controllers\Hrd\GradeController;
use App\Http\Controllers\Hrd\JabatanController;
use App\Http\Controllers\Hrd\LevelController;
use App\Http\Controllers\Hrd\LokasiController;
use App\Http\Controllers\Hrd\PegawaiAktifController;
use App\Http\Controllers\Hrd\PegawaiOutController;
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
    Route::get('getPegawaiAktif', [PegawaiAktifController::class, 'getPegawaiAktif'])->name('hrd.getPegawaiAktif');
    Route::get('addPegawaiView', [HrdController::class, 'addPegawaiView'])->name('hrd.addPegawaiView');
    Route::post('pegawaiGetJabatan', [PegawaiAktifController::class, 'pegawaiGetJabatan'])->name('hrd.pegawaiGetJabatan');
    Route::post('pegawaiGetGrade', [PegawaiAktifController::class, 'pegawaiGetGrade'])->name('hrd.pegawaiGetGrade');
    Route::post('addPegawai', [PegawaiAktifController::class, 'addPegawai'])->name('hrd.addPegawai');
    Route::post('deletePegawai', [PegawaiAktifController::class, 'deletePegawai'])->name('hrd.deletePegawai');
    Route::post('detailPegawai', [PegawaiAktifController::class, 'detailPegawai'])->name('hrd.detailPegawai');
    Route::post('keluarPegawai', [PegawaiAktifController::class, 'keluarPegawai'])->name('hrd.keluarPegawai');

    Route::get('pegawaiOut', [HrdController::class, 'pegawaiOut'])->name('hrd.pegawaiOut');
    Route::get('getPegawaiOut', [PegawaiOutController::class, 'getPegawaiOut'])->name('hrd.getPegawaiOut');
    Route::post('inPegawai', [PegawaiOutController::class, 'inPegawai'])->name('hrd.inPegawai');

    Route::get('aktivitas', [HrdController::class, 'aktivitas'])->name('hrd.aktivitas');
    Route::get('getActivity', [ActivityController::class, 'getActivity'])->name('hrd.getActivity');
    Route::post('addActivity', [ActivityController::class, 'addActivity'])->name('hrd.addActivity');
    Route::post('deleteActivity', [ActivityController::class, 'deleteActivity'])->name('hrd.deleteActivity');
    Route::post('detailActivity', [ActivityController::class, 'detailActivity'])->name('hrd.detailActivity');
    Route::post('updateActivity', [ActivityController::class, 'updateActivity'])->name('hrd.updateActivity');

    Route::get('aktivitasPegawai', [HrdController::class, 'aktivitasPegawai'])->name('hrd.aktivitasPegawai');
    Route::get('getActivityAll', [ActivityController::class, 'getActivityAll'])->name('hrd.getActivityAll');

    Route::get('rekapAktivitas', [HrdController::class, 'rekapAktivitas'])->name('hrd.rekapAktivitas');
    Route::get('getRekapActivity', [ActivityController::class, 'getRekapActivity'])->name('hrd.getRekapActivity');
});
