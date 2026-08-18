<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('index');
});

Route::get('/admin', function () {
    return view('admin');
});

// Veritabanı sütunlarını ve tablolarını eksiksiz güncelleyen rota
Route::get('/sistemi-sifirla', function() {
    try {
        DB::statement('ALTER TABLE t_urunkart ADD COLUMN aciklama TEXT NULL');
    } catch(\Exception $e) {}
    try { DB::statement('ALTER TABLE t_urunkart ADD COLUMN kalori INT NULL'); } catch(\Exception $e) {}
    try { DB::statement('ALTER TABLE t_urunkart ADD COLUMN sure INT NULL'); } catch(\Exception $e) {}
    try { DB::statement('ALTER TABLE t_urunkart ADD COLUMN is_gluten_free BOOLEAN DEFAULT 0'); } catch(\Exception $e) {}
    try { DB::statement('ALTER TABLE t_urunkart ADD COLUMN alerjen TEXT NULL'); } catch(\Exception $e) {}
    
    return "Veritabanı sütunları başarıyla güncellendi! Artık admin paneline dönebilirsin.";
});

Route::get('/api/menu', function () {
    return response()->json([
        'kategoriler' => DB::table('t_urungrubu')->get(),
        'urunler' => DB::table('t_urunkart')->orderBy('Sira')->get()
    ]);
});

Route::post('/api/urun-ekle', function (Request $request) {
    try {
        $resimYolu = '/images/urunler/images/kahvalti.jpg';

        if ($request->hasFile('resim')) {
            $dosya = $request->file('resim');
            $isim = time() . '_' . $dosya->getClientOriginalName();
            $dosya->move(public_path('images/urunler/images'), $isim);
            $resimYolu = '/images/urunler/images/' . $isim;
        }

        DB::table('t_urunkart')->insert([
            'UrunAd' => $request->input('ad'),
            'UrunGrubu' => $request->input('kategori'),
            'FixFiyat' => $request->input('fiyat'),
            'Sira' => $request->input('sira') ?? 1,
            'resim_url' => $resimYolu,
            'aciklama' => $request->input('aciklama'),
            'alerjen' => $request->input('alerjen'),
            'kalori' => $request->input('kalori'),
            'sure' => $request->input('sure'),
            'is_gluten_free' => $request->input('is_gluten_free') ?? 0,
        ]);

        return response()->json(['durum' => 'basarili', 'mesaj' => 'Ürün tüm detaylarıyla başarıyla eklendi!']);
    } catch (\Exception $e) {
        return response()->json(['durum' => 'hata', 'mesaj' => $e->getMessage()]);
    }
});

// ÜRÜN SİLME ROTOSU
Route::post('/api/urun-sil/{id}', function ($id) {
    try {
        $urun = DB::table('t_urunkart')->where('id', $id)->first();
        if ($urun) {
            DB::table('t_urunkart')->where('id', $id)->delete();
            return response()->json(['durum' => 'basarili', 'mesaj' => 'Ürün sistemden başarıyla silindi!']);
        }
        return response()->json(['durum' => 'hata', 'mesaj' => 'Ürün bulunamadı!']);
    } catch (\Exception $e) {
        return response()->json(['durum' => 'hata', 'mesaj' => $e->getMessage()]);
    }
});

// ÜRÜN GÜNCELLEME ROTOSU
Route::post('/api/urun-guncelle/{id}', function (Request $request, $id) {
    try {
        $guncellemeVerileri = [
            'UrunAd' => $request->input('ad'),
            'UrunGrubu' => $request->input('kategori'),
            'FixFiyat' => $request->input('fiyat'),
            'Sira' => $request->input('sira') ?? 1,
            'aciklama' => $request->input('aciklama'),
            'alerjen' => $request->input('alerjen'),
            'kalori' => $request->input('kalori'),
            'sure' => $request->input('sure'),
            'is_gluten_free' => $request->input('is_gluten_free') ?? 0,
        ];

        if ($request->hasFile('resim')) {
            $dosya = $request->file('resim');
            $isim = time() . '_' . $dosya->getClientOriginalName();
            $dosya->move(public_path('images/urunler/images'), $isim);
            $guncellemeVerileri['resim_url'] = '/images/urunler/images/' . $isim;
        }

        DB::table('t_urunkart')->where('id', $id)->update($guncellemeVerileri);

        return response()->json(['durum' => 'basarili', 'mesaj' => 'Ürün başarıyla güncellendi!']);
    } catch (\Exception $e) {
        return response()->json(['durum' => 'hata', 'mesaj' => $e->getMessage()]);
    }
});

// --- WHITE-LABEL (SİTE AYARLARI) ROTALARI ---

Route::get('/api/ayarlar', function () {
    try {
        $ayar = DB::table('t_ayarlar')->first();
        if (!$ayar) {
            return response()->json([
                'sirket_adi' => 'Center Cafe',
                'slogan' => 'Cafe & Bistro',
                'wifi_sifresi' => 'center2026',
                'telefon' => '+90 555 123 45 67',
                'adres' => 'Merkez Mah. No:123'
            ]);
        }
        return response()->json($ayar);
    } catch (\Exception $e) {
        return response()->json([
            'sirket_adi' => 'Center Cafe',
            'wifi_sifresi' => 'center2026'
        ]);
    }
});

Route::post('/api/ayarlar-guncelle', function (Request $request) {
    try {
        if (!Illuminate\Support\Facades\Schema::hasTable('t_ayarlar')) {
            Illuminate\Support\Facades\Schema::create('t_ayarlar', function ($table) {
                $table->id();
                $table->string('sirket_adi')->default('Center Cafe');
                $table->string('wifi_sifresi')->default('center2026');
                $table->string('telefon')->nullable();
                $table->string('adres')->nullable();
            });
            DB::table('t_ayarlar')->insert(['sirket_adi' => 'Center Cafe', 'wifi_sifresi' => 'center2026']);
        }

        DB::table('t_ayarlar')->updateOrInsert(
            ['id' => 1],
            [
                'sirket_adi' => $request->input('sirket_adi', 'Center Cafe'),
                'wifi_sifresi' => $request->input('wifi_sifresi', 'center2026'),
                'telefon' => $request->input('telefon'),
                'adres' => $request->input('adres'),
            ]
        );

        return response()->json(['durum' => 'basarili', 'mesaj' => 'Kurumsal ayarlar başarıyla güncellendi!']);
    } catch (\Exception $e) {
        return response()->json(['durum' => 'hata', 'mesaj' => $e->getMessage()]);
    }
});
// --- MUTFAK / CANLI SİPARİŞ YÖNETİMİ ---

Route::get('/mutfak', function () {
    return view('mutfak');
});

// Mutfak ekranı için bekleyen siparişleri listeleyen API
Route::get('/api/mutfak/siparisler', function () {
    try {
        $siparisler = DB::table('web_orders')
            ->orderBy('id', 'desc')
            ->get();
        return response()->json($siparisler);
    } catch (\Exception $e) {
        return response()->json([]);
    }
});

// Siparişi tamamlandı olarak işaretleme veya silme rotası
Route::post('/api/mutfak/siparis-durum/{id}', function ($id, Request $request) {
    try {
        DB::table('web_orders')->where('id', $id)->delete(); // Veya duruma göre update yapılabilir
        return response()->json(['durum' => 'basarili', 'mesaj' => 'Sipariş tamamlandı ve listeden kaldırıldı.']);
    } catch (\Exception $e) {
        return response()->json(['durum' => 'hata', 'mesaj' => $e->getMessage()]);
    }
});