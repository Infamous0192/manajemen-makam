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
        Schema::create('tumpangan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pemohon', 50);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('kewarganegaraan', 50);
            $table->string('agama', 50);
            $table->text('alamat');
            $table->integer('id_jenazah')->unsigned();
            $table->timestamps();

            $table->foreign('id_jenazah')
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
        Schema::dropIfExists('tumpangan');
    }
};
