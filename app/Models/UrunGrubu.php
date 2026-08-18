<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrunGrubu extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 't_urungrubu';

    protected $fillable = [
        'Sirano',
        'Urungrubu',
        'Dil_id',
        'UrunGrubuResimPath',
        'AnaGrup'
    ];
}
