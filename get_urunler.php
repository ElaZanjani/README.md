<?php
<<<<<<< HEAD
header('Content-Type: application/json; charset=utf-8');
require_once 'db.php';

try {
    $stmt = $db->prepare("SELECT * FROM t_urunkart ORDER BY id DESC");
    $stmt->execute();
    $hamUrunler = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $urunler = [];
    foreach ($hamUrunler as $urun) {
        $urunler[] = [
            'id' => $urun['id'] ?? null,
            // Admin panelinin birebir aradığı orijinal büyük harfli sütun isimleri:
            'UrunAd' => $urun['UrunAd'] ?? ($urun['UrunAdKisa'] ?? 'İsimsiz Ürün'),
            'UrunGrubu' => $urun['UrunGrubu'] ?? 'Genel',
            'FixFiyat' => $urun['FixFiyat'] ?? 0,
            'Sira' => $urun['Sira'] ?? ($urun['SiraNo'] ?? 1),
            'aciklama' => $urun['aciklama'] ?? ($urun['UrunAciklama'] ?? ''),
            'alerjen' => $urun['alerjen'] ?? '',
            'kalori' => $urun['kalori'] ?? 0,
            'sure' => $urun['sure'] ?? 0,
            'is_gluten_free' => $urun['is_gluten_free'] ?? 0,
            'resim_url' => $urun['resim_url'] ?? ($urun['UrunResimPath'] ?? null)
        ];
    }

    echo json_encode([
        'status' => 'success',
        'data' => $urunler
    ], JSON_UNESCAPED_UNICODE);

} catch(PDOException $e) {
=======
// Sayfanın bir JSON API'si olarak çalışacağını belirtiyoruz
header('Content-Type: application/json; charset=utf-8');

// Veritabanı bağlantı dosyasını çağırıyoruz (aynı klasörde oldukları için direkt db.php)
require_once 'db.php';

try {
    // Ürünleri 'Sira' numarasına göre küçükten büyüğe sıralı şekilde çekiyoruz
    $stmt = $db->prepare("SELECT * FROM urunler ORDER BY Sira ASC");
    $stmt->execute();
    
    // Verileri dizi formatında alıyoruz
    $urunler = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Frontend (JavaScript) tarafının okuyabilmesi için JSON'a çevirip ekrana basıyoruz
    echo json_encode([
        'status' => 'success',
        'data' => $urunler
    ]);

} catch(PDOException $e) {
    // Olası bir hatada sistemin çökmemesini sağlıyoruz
>>>>>>> 91e4d8f9b46df1cfb9e71794f6b8049b072fc44d
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
?>