<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCodeKart extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 't_qrcodekart';

    protected $primaryKey = 'id_QRCode';

    protected $fillable = [
        'QRCode',
        'Cari_id',
        'QRTur',
        'KullaniciParola',
        'Masa_id',
        'Masaismi',
        'MusteriAd',
        'KullaniciAd',
        'Personel_id',
        'Status',
    ];
}
