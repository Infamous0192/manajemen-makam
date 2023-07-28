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
        Schema::create('makam', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 50);
            $table->integer('baris');
            $table->integer('kolom');
            $table->integer('id_tpu')->unsigned();
            $table->timestamps();

            $table->foreign('id_tpu')
                ->references('id')
                ->on('tpu')
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
        Schema::dropIfExists('makam');
    }
};
