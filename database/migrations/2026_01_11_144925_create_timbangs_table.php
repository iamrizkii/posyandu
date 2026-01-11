<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimbangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timbangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anak_id')->constrained('anaks')->onDelete('cascade');
            $table->date('tanggal');
            $table->decimal('berat_badan', 5, 2);
            $table->decimal('tinggi_badan', 5, 2);
            $table->decimal('lingkar_kepala', 5, 2);
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('timbangs');
    }
}
