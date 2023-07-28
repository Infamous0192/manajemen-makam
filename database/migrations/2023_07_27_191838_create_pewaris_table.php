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
        Schema::create('pewaris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 50);
            $table->char('nik', 16);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['laki', 'perempuan']);
            $table->string('kewarganegaraan', 50);
            $table->string('provinsi', 50);
            $table->string('kabupaten', 50);
            $table->string('kecamatan', 50);
            $table->string('kelurahan', 50);
            $table->text('alamat');
            $table->string('no_hp', 50);
            $table->string('agama', 50);
            $table->string('pendidikan', 50);
            $table->string('pekerjaan', 50);
            $table->integer('id_mendiang')->unsigned();
            $table->timestamps();

            $table->foreign('id_mendiang')
                ->references('id')
                ->on('jenazah')
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
        Schema::dropIfExists('pewaris');
    }
};
