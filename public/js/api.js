// api.js - Frontend ile Backend (Veritabanı) arasındaki iletişimi sağlayan köprü dosya

// 1. Veritabanından Ürünleri Getirme (GET) İşlemi
async function dbdenUrunleriGetir() {
    try {
        const response = await fetch('/get_urunler.php');
        const sonuc = await response.json();
        
        if (sonuc.status === 'success') {
            return sonuc.data; // Ürün listesini döndür
        } else {
            console.error('Ürünler çekilirken hata oluştu:', sonuc.message);
            return []; // Hata varsa boş liste döndür ki sistem çökmesin
        }
    } catch (hata) {
        console.error('API Bağlantı Hatası:', hata);
        return [];
    }
}

// 2. Veritabanına Yeni Ürün Ekleme (POST) İşlemi
async function dbyeUrunEkle(yeniUrunVerisi) {
    try {
       const response = await fetch('/add_urun.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(yeniUrunVerisi) // JavaScript objesini JSON formata çevirip PHP'ye yolluyoruz
        });
        
        const sonuc = await response.json();
        return sonuc; // Başarı veya hata durumunu (status, message) döndür
        
    } catch (hata) {
        console.error('Ürün ekleme isteği başarısız:', hata);
        return { status: 'error', message: 'Sunucuya ulaşılamadı. Lütfen internet bağlantınızı kontrol edin.' };
    }
}