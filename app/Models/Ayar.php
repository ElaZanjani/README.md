<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ayar extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 't_ayar';

    protected $fillable = [
        'logo',
        'url',
        'baslik',
        'telefon',
        'localeLang',
    ];
}
