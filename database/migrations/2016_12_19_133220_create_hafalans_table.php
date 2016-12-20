<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHafalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hafalans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_penghafal');
            $table->integer('id_penyimak')->nullable();
            $table->date('tanggal');
            $table->string('hafalan');
            $table->string('nilai')->nullable();
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
        Schema::dropIfExists('hafalans');
    }
}
