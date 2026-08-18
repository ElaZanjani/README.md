<?php

namespace App\Http\Traits;

use App\Models\QrCodeCagri;
use App\Models\QrCodeKart;
use DateTime;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

trait QrCodeTrait
{
    public function GetAllQrCodeKarts() : Collection
    {
        $qrs = QrCodeKart::all();
        return $qrs;
    }

    public function GetQrCodeKart($qrCode)
    {
        $qr = QrCodeKart::where('QRCode', $qrCode)->first();
        return $qr;
    }

    public function AddCallToTable($qrCode)
    {
        $qrcodeKart = QrCodeKart::where('QRCode', $qrCode)->first();

        if ($qrcodeKart){
            date_default_timezone_set('Europe/Istanbul');

            $timeSub1Min = (new DateTime())->modify('-1 minutes')->format("Y-m-d H:i:s");

            $kontrolQrCagri = QrCodeCagri::where('QRCode', $qrCode)->where('Cagri_zamani', '>', $timeSub1Min)->count();

            if ($kontrolQrCagri > 0)
                return "1 Dakikada 1 kere garson çağırabilirsiniz!";

            $qrcagri = new QrCodeCagri;

            $qrcagri->Masa_id = $qrcodeKart->Masa_id;
            $qrcagri->QRCode = $qrCode;
            $qrcagri->Masaismi = $qrcodeKart->Masaismi;
            $qrcagri->Cagri_zamani = now();
            $qrcagri->Personel_id = 0;
            $qrcagri->Status = 0;

            $qrcagri->save();

            return "ok";
        }
        else{
            return "qrcode couldnt found.";
        }
    }
}
