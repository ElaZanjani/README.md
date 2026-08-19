<?php
header('Content-Type: application/json; charset=utf-8');
require_once 'db.php';

<<<<<<< HEAD
=======
// Form-data veya JSON verisini yakala
>>>>>>> 91e4d8f9b46df1cfb9e71794f6b8049b072fc44d
$ad = $_POST['ad'] ?? '';
$kategori = $_POST['kategori'] ?? '';
$fiyat = $_POST['fiyat'] ?? 0;
$sira = $_POST['sira'] ?? 1;
$aciklama = $_POST['aciklama'] ?? null;
$alerjen = $_POST['alerjen'] ?? null;
$kalori = $_POST['kalori'] ?? null;
$sure = $_POST['sure'] ?? null;
$gluten = $_POST['is_gluten_free'] ?? 0;

if (!empty($ad) && !empty($kategori)) {
    $resimYolu = null;
    
<<<<<<< HEAD
=======
    // Eğer resim yüklendiyse public/images klasörüne kaydet
>>>>>>> 91e4d8f9b46df1cfb9e71794f6b8049b072fc44d
    if (isset($_FILES['resim']) && $_FILES['resim']['error'] === UPLOAD_ERR_OK) {
        $dosyaAdi = time() . '_' . preg_replace("/[^a-zA-Z0-9\._-]/", "", $_FILES['resim']['name']);
        $hedefKlasor = __DIR__ . '/images/';
        if (!is_dir($hedefKlasor)) {
            mkdir($hedefKlasor, 0755, true);
        }
        if (move_uploaded_file($_FILES['resim']['tmp_name'], $hedefKlasor . $dosyaAdi)) {
            $resimYolu = 'images/' . $dosyaAdi;
        }
    }

    try {
<<<<<<< HEAD
        $sorgu = $db->prepare("INSERT INTO t_urunkart (UrunAd, UrunGrubu, FixFiyat, aciklama, alerjen, kalori, is_gluten_free, resim_url, Sira) 
=======
        $sorgu = $db->prepare("INSERT INTO urunler (UrunAd, UrunGrubu, FixFiyat, aciklama, alerjen, kalori, is_gluten_free, resim_url, Sira) 
>>>>>>> 91e4d8f9b46df1cfb9e71794f6b8049b072fc44d
                              VALUES (:ad, :kategori, :fiyat, :aciklama, :alerjen, :kalori, :gluten, :resim, :sira)");
        
        $sorgu->execute([
            ':ad' => $ad,
            ':kategori' => $kategori,
            ':fiyat' => $fiyat,
            ':aciklama' => $aciklama,
            ':alerjen' => $alerjen,
            ':kalori' => $kalori,
            ':gluten' => $gluten,
            ':resim' => $resimYolu,
            ':sira' => $sira
        ]);

        echo json_encode(['status' => 'success', 'message' => 'Ürün başarıyla veritabanına eklendi!']);
    } catch(PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Veritabanı Hatası: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Lütfen Ürün Adı ve Kategoriyi boş bırakmayın.']);
}
?>