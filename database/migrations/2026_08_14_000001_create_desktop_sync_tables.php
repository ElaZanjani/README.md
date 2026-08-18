<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Masaların güncel durumu (Kasa/Masaüstü buradan besler, Web buradan okur)
        if (!Schema::hasTable('t_masalar')) {
            Schema::create('t_masalar', function (Blueprint $table) {
                $table->id();
                $table->string('isim')->unique();
                $table->tinyInteger('durum')->default(0); // 0 = boş, 1 = dolu
                $table->decimal('guncel_tutar', 10, 2)->default(0);
                $table->json('siparisler')->nullable();
                $table->timestamps();
            });
        }

        // Gün sonu / Z-Raporu kayıtları (Kasa -> Web)
        if (!Schema::hasTable('kasa_z_raporlari')) {
            Schema::create('kasa_z_raporlari', function (Blueprint $table) {
                $table->id();
                $table->date('tarih');
                $table->decimal('nakit_toplam', 10, 2)->default(0);
                $table->decimal('kredi_karti_toplam', 10, 2)->default(0);
                $table->decimal('yemek_karti_toplam', 10, 2)->default(0);
                $table->decimal('veresiye_toplam', 10, 2)->default(0);
                $table->json('islemler')->nullable();
                $table->timestamps();
            });
        }

        // Müşterinin QR menüden gönderdiği garson çağrıları / hesap istekleri
        if (!Schema::hasTable('waiter_calls')) {
            Schema::create('waiter_calls', function (Blueprint $table) {
                $table->id();
                $table->string('masa_ismi');
                $table->unsignedBigInteger('masa_id')->nullable();
                $table->enum('cagri_tipi', ['garson_cagir', 'hesap_iste'])->default('garson_cagir');
                $table->timestamp('cagri_zamani');
                $table->boolean('pulled')->default(false);
                $table->timestamps();
            });
        }

        // Müşterinin web/QR üzerinden verdiği siparişler (ileride sepetli menü için de kullanılacak)
        if (!Schema::hasTable('web_orders')) {
            Schema::create('web_orders', function (Blueprint $table) {
                $table->id();
                $table->string('masa_isim');
                $table->string('urun_adi');
                $table->integer('adet')->default(1);
                $table->decimal('fiyat', 10, 2)->default(0);
                $table->json('ozellikler')->nullable();
                $table->text('siparis_notu')->nullable();
                $table->timestamp('siparis_saati');
                $table->boolean('pulled')->default(false);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('web_orders');
        Schema::dropIfExists('waiter_calls');
        Schema::dropIfExists('kasa_z_raporlari');
        Schema::dropIfExists('t_masalar');
    }
};