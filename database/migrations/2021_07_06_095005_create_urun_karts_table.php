<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrunKartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_urunkart', function (Blueprint $table) {
            $table->id();

            $table->integer('Urun_id')->nullable();
            $table->string('UrunTip')->nullable();
            $table->string('UrunKod')->nullable();
            $table->string('UrunAd')->nullable();
            $table->string('UrunAdKisa')->nullable();
            $table->string('UrunAciklama')->nullable();
            $table->string('UrunGrubu')->nullable();
            $table->integer('UrunGrubu_id')->nullable();
            $table->double('FixFiyat')->nullable();
            $table->integer('SiraNo')->default('0');
            $table->double('P_Yarim')->nullable();
            $table->double('P_Birbucuk')->nullable();
            $table->double('P_Duble')->nullable();
            $table->string('Porsiyon')->nullable();
            $table->string('ExtraOzellik')->nullable();
            $table->string('Barkod')->nullable();
            $table->string('UrunBirim')->nullable();
            $table->double('FixFiyat2')->nullable();
            $table->double('FixFiyat3')->nullable();
            $table->string('Departman')->nullable();
            $table->text('UrunResimPath')->nullable();
            $table->string('AltGrup')->nullable();
            $table->string('Ch_Gram')->nullable();
            $table->dateTime('Upd_Tarih')->default('2021-01-01');
            $table->integer('CokSatan')->nullable();
            $table->text('textraozellik')->nullable();
            $table->text('P_Tanim')->nullable();

            $table->unique('Urun_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_urunkart');
    }
}
