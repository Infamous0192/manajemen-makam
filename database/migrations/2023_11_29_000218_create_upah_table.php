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
        Schema::create('upah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis', 100);
            $table->integer('jumlah');
            $table->integer('id_pekerja')->unsigned();
            $table->timestamps();

            $table->foreign('id_pekerja')
                ->references('id')
                ->on('pekerja')
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
        Schema::dropIfExists('upah');
    }
};
