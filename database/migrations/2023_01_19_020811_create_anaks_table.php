<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anaks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ortu_id');
            $table->string('nama_anak');
            $table->string('tempat_lhr');
            $table->date('tgl_lhr');
            $table->float('bb_lhr');
            $table->float('tb_lhr');
            $table->string('jenis_kelamin');
            $table->integer('anak_ke');
            $table->string('nik_anak')->nullable();
            $table->string('bpjs_anak')->nullable();
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
        Schema::dropIfExists('anaks');
    }
}
