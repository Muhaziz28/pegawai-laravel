<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nip',
        'nik',
        'name',
        'email',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'agama',
        'status',
        'status_pegawai',
        'alamat',
        'nohp',
        'pendidikan',
        'id_divisi',
        'id_jabatan',
        'id_level',
        'id_lokasi',
        'id_grade',
        'tgl_masuk',
        'tgl_mulai_kontrak',
        'tgl_akhir_kontrak',
        'image',
        'jatah_cuti',
        'is_out',
        'alasan',
        'alasan_keluar',
        'bpjs_ketenagakerjaan',
        'bpjs_kesehatan',
        'ukuran_baju',
        'email_verified_at',
        'password_view',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
