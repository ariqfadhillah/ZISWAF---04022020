<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuitansiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuitansi', function (Blueprint $table) {
            $table->id();
            $table->datetime('tgl_setor');
            $table->string('number_kuitansi');
            $table->string('nama_penyetor');
            $table->string('alamat_penyetor');
            $table->double('nilai_ziswaf');
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
        Schema::dropIfExists('kuitansi');
    }
}
