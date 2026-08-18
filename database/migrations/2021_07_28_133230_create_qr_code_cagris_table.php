<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrCodeCagrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_qrcodecagri', function (Blueprint $table) {
            $table->id();
            $table->integer('Masa_id');
            $table->string('QRCode');
            $table->string('Masaismi');
            $table->integer('Personel_id');
            $table->dateTime('Cagri_zamani');
            $table->integer('Status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_qrcodecagri');
    }
}
