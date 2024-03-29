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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 50);
            $table->enum('jenis', ['baru', 'perpanjangan']);
            $table->integer('jumlah');
            $table->boolean('domisili');
            $table->boolean('jasa_gali');
            $table->boolean('jasa_rawat');
            $table->integer('id_jenazah')->unsigned();
            $table->integer('id_makam')->unsigned();
            $table->timestamps();

            $table->foreign('id_jenazah')
                ->references('id')
                ->on('jenazah')
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
        Schema::dropIfExists('pembayaran');
    }
};
