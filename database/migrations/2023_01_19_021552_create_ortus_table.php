<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrtusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ortus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ibu');
            $table->string('nama_ayah');
            $table->string('tempat_lhr');
            $table->date('tgl_lhr');
            $table->string('alamat');
            $table->string('agama');
            $table->string('nik')->nullable();
            $table->string('kk')->nullable();
            $table->string('nohp')->nullable();
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
        Schema::dropIfExists('ortus');
    }
}
