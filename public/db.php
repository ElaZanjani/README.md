<?php
// Hata gösterimini aktif edelim (Geliştirme aşamasında olduğumuz için)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// .env dosyasındaki ayarlara uygun veritabanı bilgileri
$host = '127.0.0.1';
$dbname = 'qrmenu_sepet_db';
$username = 'root';
$password = ''; // XAMPP/Laragon varsayılan şifresi genellikle boştur

try {
    // PDO ile güvenli bağlantı oluşturma
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    
    // PDO hata modunu Exception olarak ayarlama
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // Test aşaması için başarılı bağlantı mesajı (Canlıya alırken bu satırı sileceğiz)
    // echo "Veritabanı bağlantısı başarılı!"; 
    
} catch(PDOException $e) {
    // Bağlantı hatası olursa ekrana yazdır
    die("Veritabanı Bağlantı Hatası: " . $e->getMessage());
}
?>