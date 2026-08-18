<?php

namespace App\Http\Repositories\QrCode;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
* Interface QrCodeKartRepositoryInterface
* @package App\Repositories
*/
interface QrCodeKartRepositoryInterface
{
    public function GetAllQrCodeKarts() : Collection;

    public function GetQrCodeKart($qrCode);

    public function AddCallToTable($qrCode);
}
