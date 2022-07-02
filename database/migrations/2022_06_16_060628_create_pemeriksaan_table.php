<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeriksaan', function (Blueprint $table) {
            $table->increments('pemeriksaan_id');
            $table->Integer('dokters_id')->unsigned();
            $table->foreign('dokters_id')
                ->references('dokters_id')
                ->on('dokters')
                ->onDelete('cascade');

            $table->Integer('pasien_id')->unsigned();
            $table->foreign('pasien_id')
                ->references('pasien_id')
                ->on('pasien')
                ->onDelete('cascade');
                
            $table->Integer('rekam_medis_id')->unsigned();
            $table->foreign('rekam_medis_id')
                ->references('rekam_medis_id')
                ->on('rekam_medis')
                ->onDelete('cascade');
            $table->date('tgl_pemeriksaan');
            $table->string('jenis_pemeriksaan');
            $table->integer('biaya');
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
        Schema::dropIfExists('pemeriksaan');
    }
}
