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
            $table->id();
            $table->enum('jenis', ['baru', 'perpanjangan']);
            $table->integer('jumlah');
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
