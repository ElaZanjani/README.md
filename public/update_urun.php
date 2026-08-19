<?php
header('Content-Type: application/json; charset=utf-8');
require_once 'db.php';

$id = $_POST['id'] ?? null;
$ad = $_POST['ad'] ?? '';
$kategori = $_POST['kategori'] ?? '';
$fiyat = $_POST['fiyat'] ?? 0;
$sira = $_POST['sira'] ?? 1;
$aciklama = $_POST['aciklama'] ?? null;
$alerjen = $_POST['alerjen'] ?? null;
$kalori = $_POST['kalori'] ?? null;
$sure = $_POST['sure'] ?? null;
$gluten = $_POST['is_gluten_free'] ?? 0;

if (empty($id) || empty($ad) || empty($kategori)) {
    echo json_encode(['status' => 'error', 'message' => 'Eksik bilgi: id, ad ve kategori zorunludur.']);
    exit;
}

try {
    $resimGuncelleme = "";
    $params = [
        ':id' => $id,
        ':ad' => $ad,
        ':kategori' => $kategori,
        ':fiyat' => $fiyat,
        ':aciklama' => $aciklama,
        ':alerjen' => $alerjen,
        ':kalori' => $kalori,
        ':gluten' => $gluten,
        ':sira' => $sira
    ];

    if (isset($_FILES['resim']) && $_FILES['resim']['error'] === UPLOAD_ERR_OK) {
        $dosyaAdi = time() . '_' . preg_replace("/[^a-zA-Z0-9\._-]/", "", $_FILES['resim']['name']);
        $hedefKlasor = __DIR__ . '/images/';
        if (!is_dir($hedefKlasor)) {
            mkdir($hedefKlasor, 0755, true);
        }
        if (move_uploaded_file($_FILES['resim']['tmp_name'], $hedefKlasor . $dosyaAdi)) {
            $resimGuncelleme = ", resim_url = :resim";
            $params[':resim'] = 'images/' . $dosyaAdi;
        }
    }

    $sorgu = $db->prepare("UPDATE t_urunkart SET
                            UrunAd = :ad,
                            UrunGrubu = :kategori,
                            FixFiyat = :fiyat,
                            aciklama = :aciklama,
                            alerjen = :alerjen,
                            kalori = :kalori,
                            is_gluten_free = :gluten,
                            Sira = :sira
                            $resimGuncelleme
                            WHERE id = :id");

    $sorgu->execute($params);

    echo json_encode(['status' => 'success', 'message' => 'Ürün başarıyla güncellendi!']);
} catch(PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Veritabanı Hatası: ' . $e->getMessage()]);
}
?>