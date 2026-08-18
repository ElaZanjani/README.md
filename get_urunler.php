<?php
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
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
?>