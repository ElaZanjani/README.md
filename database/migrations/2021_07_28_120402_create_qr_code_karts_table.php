<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrCodeKartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_qrcodekart', function (Blueprint $table) {
            $table->id('id_QRCode');
            $table->text('QRCode');
            $table->integer('Cari_id');
            $table->integer('QRTur');
            $table->string('KullaniciParola');
            $table->integer('Masa_id');
            $table->string('Masaismi');
            $table->string('MusteriAd');
            $table->string('KullaniciAd');
            $table->integer('Personel_id');
            $table->integer('Status');

            $table->index(['Cari_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_qrcodekart');
    }
}
