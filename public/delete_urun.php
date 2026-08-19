<?php
header('Content-Type: application/json; charset=utf-8');
require_once 'db.php';

$id = $_POST['id'] ?? null;

if (empty($id)) {
    echo json_encode(['status' => 'error', 'message' => 'Ürün ID gerekli.']);
    exit;
}

try {
    $sorgu = $db->prepare("DELETE FROM t_urunkart WHERE id = :id");
    $sorgu->execute([':id' => $id]);

    echo json_encode(['status' => 'success', 'message' => 'Ürün başarıyla silindi!']);
} catch(PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Veritabanı Hatası: ' . $e->getMessage()]);
}
?>