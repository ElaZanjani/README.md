<?php
// Sayfanın bir JSON API'si olarak çalışacağını belirtiyoruz
header('Content-Type: application/json; charset=utf-8');

// Bir önceki adımda yazdığımız veritabanı bağlantısını çağırıyoruz
require_once 'db.php';

try {
    // Ürünleri 'Sira' numarasına göre küçükten büyüğe sıralı şekilde çekiyoruz
    $stmt = $db->prepare("SELECT * FROM urunler ORDER BY Sira ASC");
    $stmt->execute();
    
    // Verileri dizi (array) formatında alıyoruz
    $urunler = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Frontend (JavaScript) tarafının okuyabilmesi için JSON'a çevirip ekrana basıyoruz
    echo json_encode([
        'status' => 'success',
        'data' => $urunler
    ]);

} catch(PDOException $e) {
    // Olası bir hatada sistemin çökmemesi için hatayı da JSON olarak döndürüyoruz
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
?>