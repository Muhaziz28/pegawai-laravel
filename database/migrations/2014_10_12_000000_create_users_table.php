<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Symfony\Component\String\b;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('nik')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('status');
            $table->string('status_pegawai');
            $table->text('alamat');
            $table->string('nohp');
            $table->string('pendidikan');

            $table->unsignedBigInteger('id_divisi');
            $table->unsignedBigInteger('id_jabatan');
            $table->unsignedBigInteger('id_level');
            $table->unsignedBigInteger('id_lokasi');
            $table->unsignedBigInteger('id_grade')->nullable();

            $table->date('tgl_masuk');
            $table->date('tgl_mulai_kontrak')->nullable();
            $table->date('tgl_akhir_kontrak')->nullable();

            $table->string('image')->nullable();

            $table->integer('jata_cuti')->default(12);

            $table->tinyInteger('is_out')->default(1);
            $table->string('alasan')->nullable();
            $table->text('alasan_keluar')->nullable();
            $table->tinyInteger('bpjs_ketenagakerjaan')->default(0);
            $table->tinyInteger('bpjs_kesehatan')->default(0);
            $table->tinyText('ukuran_baju')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password_view');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
