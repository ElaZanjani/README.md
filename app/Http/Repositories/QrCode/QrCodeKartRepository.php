<?php

namespace App\Http\Repositories\QrCode;

use App\Http\Traits\QrCodeTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class QrCodeKartRepository implements QrCodeKartRepositoryInterface{
    use QrCodeTrait;
}
