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

Route::get('/sistemi-sifirla', function() {
    try { DB::statement('ALTER TABLE t_urunkart ADD COLUMN aciklama TEXT NULL'); } catch(\Exception $e) {}
    try { DB::statement('ALTER TABLE t_urunkart ADD COLUMN kalori INT NULL'); } catch(\Exception $e) {}
    try { DB::statement('ALTER TABLE t_urunkart ADD COLUMN sure INT NULL'); } catch(\Exception $e) {}
    try { DB::statement('ALTER TABLE t_urunkart ADD COLUMN is_gluten_free BOOLEAN DEFAULT 0'); } catch(\Exception $e) {}
    try { DB::statement('ALTER TABLE t_urunkart ADD COLUMN alerjen TEXT NULL'); } catch(\Exception $e) {}
    
    return "Veritabani basariyla guncellendi!";
});

Route::get('/api/menu', function () {
    $urunler = DB::table('t_urunkart')->orderBy('Sira')->get();
    
    foreach ($urunler as $urun) {
        $ad = mb_strtoupper(trim($urun->UrunAd ?? ''), 'UTF-8');
        $grup = mb_strtoupper(trim($urun->UrunGrubu ?? ''), 'UTF-8');

        // AKILLI KATEGORİ VE ALT KATEGORİ EŞLEŞTİRME MOTORU
        if (str_contains($grup, 'SAHANDA')) {
            $urun->UrunGrubu = 'SAHANDA';
        } elseif (str_contains($grup, 'OMLET')) {
            $urun->UrunGrubu = 'OMLET';
        } elseif (str_contains($grup, 'KENDİ KAHVALTINI YARAT')) {
            $urun->UrunGrubu = 'KENDİ KAHVALTINI YARAT';
        } elseif ($grup === 'KAHVALTILAR' || str_contains($grup, 'KAHVALTI')) {
            $urun->UrunGrubu = 'KAHVALTILAR';
        }
        
        elseif (str_contains($grup, 'SÜTLÜ TATLI') || str_contains($grup, 'SUTLU TATLI')) { $urun->UrunGrubu = 'SÜTLÜ TATLI'; }
        elseif (str_contains($grup, 'PASTALAR') || str_contains($grup, 'PASTA')) { $urun->UrunGrubu = 'PASTALAR'; }
        elseif (str_contains($grup, 'ŞERBETLİ TATLI') || str_contains($grup, 'SERBETLI')) { $urun->UrunGrubu = 'ŞERBETLİ TATLI'; }
        elseif (str_contains($grup, 'KİLOLUK ÜRÜNLER') || str_contains($grup, 'KILOLUK')) { $urun->UrunGrubu = 'KİLOLUK ÜRÜNLER'; }
        elseif (str_contains($grup, 'KEKLER')) { $urun->UrunGrubu = 'KEKLER'; }
        elseif (str_contains($grup, 'İLAVELER') || str_contains($grup, 'ILAVELER')) { $urun->UrunGrubu = 'İLAVELER'; }
        elseif ($grup === 'TATLILAR') { $urun->UrunGrubu = 'TATLILAR'; }

        elseif (str_contains($grup, 'DÜNYA KAHVELERİ') || str_contains($grup, 'DUNYA KAHVELERI')) { $urun->UrunGrubu = 'DÜNYA KAHVELERİ'; }
        elseif (str_contains($grup, 'BİTKİ ÇAYI') || str_contains($grup, 'BITKI CAYI')) { $urun->UrunGrubu = 'BİTKİ ÇAYI'; }
        elseif ($grup === 'SICAK İÇECEKLER') { $urun->UrunGrubu = 'SICAK İÇECEKLER'; }

        elseif (str_contains($grup, 'SOĞUK KAHVELER') || str_contains($grup, 'SOGUK KAHVELER')) { $urun->UrunGrubu = 'SOĞUK KAHVELER'; }
        elseif (str_contains($grup, 'MEŞRUBATLAR') || str_contains($grup, 'MESRUBATLAR')) { $urun->UrunGrubu = 'MEŞRUBATLAR'; }
        elseif (str_contains($grup, 'FROZEN')) { $urun->UrunGrubu = 'FROZEN'; }
        elseif (str_contains($grup, 'SMOOTHIE') || str_contains($grup, 'SMOOTHİE')) { $urun->UrunGrubu = 'SMOOTHIE'; }
        elseif (str_contains($grup, 'MILKSHAKE')) { $urun->UrunGrubu = 'MILKSHAKE'; }
        elseif (str_contains($grup, 'FRAPPE')) { $urun->UrunGrubu = 'FRAPPE'; }
        elseif (str_contains($grup, 'KOKTEYL & DETOX')) { $urun->UrunGrubu = 'KOKTEYL & DETOX'; }
        elseif ($grup === 'SOĞUK İÇECEKLER') { $urun->UrunGrubu = 'SOĞUK İÇECEKLER'; }

        elseif ($grup === 'DONDURMALAR') { $urun->UrunGrubu = 'DONDURMALAR'; }

        elseif (str_contains($grup, 'GÖZLEMELER') || str_contains($grup, 'GOZLEMELER')) { $urun->UrunGrubu = 'GÖZLEMELER'; }
        elseif (str_contains($grup, 'TOSTLAR')) { $urun->UrunGrubu = 'TOSTLAR'; }
        elseif (str_contains($grup, 'KÖYLÜM') || str_contains($grup, 'BAZLAMA')) { $urun->UrunGrubu = 'KÖYLÜM (BAZLAMA) TOSTLAR'; }
        elseif (str_contains($grup, 'KÖY EKMEĞİ')) { $urun->UrunGrubu = 'KÖY EKMEĞİ TOSTLAR'; }
        elseif (str_contains($grup, 'APERATİFLER') || str_contains($grup, 'APERATIFLER')) { $urun->UrunGrubu = 'APERATİFLER'; }
        elseif ($grup === 'GÖZLEME & TOST') { $urun->UrunGrubu = 'GÖZLEME & TOST'; }
    }

    return response()->json([
        'kategoriler' => DB::table('t_urungrubu')->get(),
        'urunler' => $urunler
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

        return response()->json(['durum' => 'basarili', 'mesaj' => 'Urun basariyla eklendi!']);
    } catch (\Exception $e) {
        return response()->json(['durum' => 'hata', 'mesaj' => $e->getMessage()]);
    }
});

Route::post('/api/urun-sil/{id}', function ($id) {
    try {
        $urun = DB::table('t_urunkart')->where('id', $id)->first();
        if ($urun) {
            DB::table('t_urunkart')->where('id', $id)->delete();
            return response()->json(['durum' => 'basarili', 'mesaj' => 'Urun silindi!']);
        }
        return response()->json(['durum' => 'hata', 'mesaj' => 'Urun bulunamadi!']);
    } catch (\Exception $e) {
        return response()->json(['durum' => 'hata', 'mesaj' => $e->getMessage()]);
    }
});

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

        return response()->json(['durum' => 'basarili', 'mesaj' => 'Urun basariyla guncellendi!']);
    } catch (\Exception $e) {
        return response()->json(['durum' => 'hata', 'mesaj' => $e->getMessage()]);
    }
});

Route::get('/api/ayarlar', function () {
    try {
        $ayar = DB::table('t_ayarlar')->first();
        if (!$ayar) {
            return response()->json([
                'sirket_adi' => 'Center Cafe',
                'wifi_sifresi' => 'center2026'
            ]);
        }
        return response()->json($ayar);
    } catch (\Exception $e) {
        return response()->json(['sirket_adi' => 'Center Cafe']);
    }
});

Route::post('/api/ayarlar-guncelle', function (Request $request) {
    try {
        DB::table('t_ayarlar')->updateOrInsert(
            ['id' => 1],
            [
                'sirket_adi' => $request->input('sirket_adi', 'Center Cafe'),
                'wifi_sifresi' => $request->input('wifi_sifresi', 'center2026'),
                'telefon' => $request->input('telefon'),
                'adres' => $request->input('adres'),
            ]
        );
        return response()->json(['durum' => 'basarili', 'mesaj' => 'Ayarlar guncellendi!']);
    } catch (\Exception $e) {
        return response()->json(['durum' => 'hata', 'mesaj' => $e->getMessage()]);
    }
});

Route::get('/mutfak', function () {
    return view('mutfak');
});

Route::get('/api/mutfak/siparisler', function () {
    try {
        return response()->json(DB::table('web_orders')->orderBy('id', 'desc')->get());
    } catch (\Exception $e) {
        return response()->json([]);
    }
});

Route::post('/api/mutfak/siparis-durum/{id}', function ($id) {
    try {
        DB::table('web_orders')->where('id', $id)->delete();
        return response()->json(['durum' => 'basarili', 'mesaj' => 'Siparis tamamlandi.']);
    } catch (\Exception $e) {
        return response()->json(['durum' => 'hata', 'mesaj' => $e->getMessage()]);
    }
});