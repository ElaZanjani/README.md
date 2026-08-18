<?php
// Bu sayfanın JSON verisi alıp JSON döndüreceğini belirtiyoruz
header('Content-Type: application/json; charset=utf-8');
require_once 'db.php';

// Frontend'den gelen JSON verisini yakalıyoruz
$veri = json_decode(file_get_contents("php://input"), true);

// Gerekli veriler (Ürün Adı ve Grubu) gelmiş mi diye kontrol ediyoruz
if(isset($veri['UrunAd']) && isset($veri['UrunGrubu'])) {
    
    try {
        // Güvenli (PDO) şekilde SQL Ekleme (INSERT) komutumuzu hazırlıyoruz
        $sorgu = $db->prepare("INSERT INTO urunler (UrunAd, UrunGrubu, FixFiyat, aciklama, alerjen, kalori, is_gluten_free) 
                               VALUES (:UrunAd, :UrunGrubu, :FixFiyat, :aciklama, :alerjen, :kalori, :is_gluten_free)");
        
        // Gelen verileri veritabanı sütunlarına eşleştirip çalıştırıyoruz
        $sorgu->execute([
            ':UrunAd' => $veri['UrunAd'],
            ':UrunGrubu' => $veri['UrunGrubu'],
            ':FixFiyat' => isset($veri['FixFiyat']) ? $veri['FixFiyat'] : 0,
            ':aciklama' => isset($veri['aciklama']) ? $veri['aciklama'] : null,
            ':alerjen' => isset($veri['alerjen']) ? $veri['alerjen'] : null,
            ':kalori' => isset($veri['kalori']) ? $veri['kalori'] : null,
            ':is_gluten_free' => isset($veri['is_gluten_free']) ? $veri['is_gluten_free'] : 0
        ]);

        // Başarılı olursa Frontend'e (Yönetim Paneline) onay mesajı gönderiyoruz
        echo json_encode(['status' => 'success', 'message' => 'Ürün başarıyla veritabanına eklendi!']);

    } catch(PDOException $e) {
        // Hata olursa Frontend'e hatayı bildiriyoruz
        echo json_encode(['status' => 'error', 'message' => 'Veritabanı Hatası: ' . $e->getMessage()]);
    }

} else {
    // Eksik veri gelirse uyarı veriyoruz
    echo json_encode(['status' => 'error', 'message' => 'Lütfen Ürün Adı ve Grubunu boş bırakmayın.']);
}
?>