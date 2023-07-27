<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenazah', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->char('nik', 16);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['laki', 'perempuan']);
            $table->boolean('status_kawin');
            $table->string('provinsi', 50);
            $table->string('kabupaten', 50);
            $table->string('kecamatan', 50);
            $table->string('kelurahan', 50);
            $table->text('alamat_ktp');
            $table->text('alamat_sekarang');
            $table->string('agama', 50);
            $table->string('pendidikan', 50);
            $table->string('pekerjaan', 50);
            $table->date('tanggal_meninggal');
            $table->date('tanggal_makam');
            $table->integer('id_pesanan')->unsigned()->unique();
            $table->integer('id_makam')->unsigned()->unique();
            $table->timestamps();

            $table->foreign('id_pesanan')
                ->references('id')
                ->on('pesanan')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('id_makam')
                ->references('id')
                ->on('makam')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenazah');
    }
};
