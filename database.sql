-- Veritabanı Oluşturma (Senin .env dosyana uyumlu hale getirildi)
CREATE DATABASE IF NOT EXISTS qrmenu_sepet_db DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE qrmenu_sepet_db;

-- Ürünler Tablosu (Menü Verileri)
CREATE TABLE IF NOT EXISTS `urunler` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `UrunAd` varchar(255) NOT NULL,
  `UrunGrubu` varchar(255) NOT NULL,
  `FixFiyat` decimal(10,2) NOT NULL DEFAULT '0.00',
  `Sira` int(11) NOT NULL DEFAULT '99',
  `aciklama` text,
  `alerjen` varchar(255) DEFAULT NULL,
  `kalori` int(11) DEFAULT NULL,
  `sure` int(11) DEFAULT NULL,
  `is_gluten_free` tinyint(1) NOT NULL DEFAULT '0',
  `resim_url` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Ayarlar Tablosu (White-Label Kurumsal Ayarlar)
CREATE TABLE IF NOT EXISTS `ayarlar` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sirket_adi` varchar(255) DEFAULT NULL,
  `wifi_sifresi` varchar(255) DEFAULT NULL,
  `telefon` varchar(255) DEFAULT NULL,
  `adres` text,
  `yorum_linki` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Örnek Sistem Ayarları
INSERT INTO `ayarlar` (`sirket_adi`, `wifi_sifresi`, `telefon`, `adres`, `yorum_linki`) VALUES
('Center Cafe & Bistro', 'center2026', '+90 555 123 45 67', 'Merkez Mah. No:123', 'https://search.google.com/local/writereview?placeid=ChIJN1t_tDeuEmsRUsoyG83frY4');