<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiparisController extends Controller
{
    public function kaydet(Request $request)
    {
        $masaNo = $request->input('masa_no');
        $urunler = $request->input('urunler');

        try {
            foreach ($urunler as $item) {
                DB::table('web_orders')->insert([
                    'masa_isim'    => 'Masa ' . $masaNo,
                    'urun_adi'     => $item['UrunAd'] ?? 'Ürün',
                    'adet'         => $item['adet'] ?? 1,
                    'fiyat'        => $item['FixFiyat'] ?? 0,
                    'ozellikler'   => null,
                    'siparis_notu' => null,
                    'siparis_saati'=> now(), // Eklenen eksik alan!
                    'created_at'   => now(),
                    'updated_at'   => now(),
                ]);
            }

            return response()->json([
                'status'  => 'success',
                'message' => 'Sipariş başarıyla mutfağa iletildi.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Sipariş kaydedilirken bir hata oluştu: ' . $e->getMessage()
            ], 500);
        }
    }
}