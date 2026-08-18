<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCodeCagri extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 't_qrcodecagri';

    protected $fillable = [
        'Masa_id',
        'QRCode',
        'Masaismi',
        'Personel_id',
        'Cagri_zamani',
        'Status',
    ];

}
