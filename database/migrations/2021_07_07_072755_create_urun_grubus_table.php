<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrunGrubusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_urungrubu', function (Blueprint $table) {
            $table->id();

            $table->integer('UrunGrubu_id');
            $table->integer('Sirano');
            $table->string('Urungrubu');
            $table->integer('Dil_id')->nullable();
            $table->string('UrunGrubuResimPath');

            $table->unique('UrunGrubu_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_urungrubu');
    }
}
