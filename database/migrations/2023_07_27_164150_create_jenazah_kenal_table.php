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
        Schema::create('jenazah_kenal', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('tempat_ditemukan', 50);
            $table->date('tanggal_ditemukan');
            $table->enum('jenis_kelamin', ['laki', 'perempuan']);
            $table->string('kewarganegaraan', 50);
            $table->string('provinsi', 50);
            $table->string('kabupaten', 50);
            $table->string('kecamatan', 50);
            $table->string('kelurahan', 50);
            $table->integer('rt');
            $table->integer('rw');
            $table->integer('id_makam')->unsigned()->unique();
            $table->timestamps();

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
        Schema::dropIfExists('jenazah_kenal');
    }
};
