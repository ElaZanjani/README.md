<?php
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
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
?>