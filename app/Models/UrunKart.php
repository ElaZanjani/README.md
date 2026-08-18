<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrunKart extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 't_urunkart';

    protected $fillable = [
       'UrunTip',
       'UrunKod',
       'UrunAd',
       'UrunAdKisa',
       'UrunAciklama',
       'UrunGrubu',
        'UrunGrubu_id',
        'FixFiyat',
        'SiraNo',
        'P_Yarim',
        'P_Birbucuk',
        'P_Duble',
       'Porsiyon',
       'ExtraOzellik',
       'Barkod',
       'UrunBirim',
        'FixFiyat2',
        'FixFiyat3',
       'Departman',
        'UrunResimPath',
       'AltGrup',
       'Ch_Gram',
        'Upd_Tarih',
        'CokSatan',
        'textraozellik',
        'P_Tanim',
    ];

}

