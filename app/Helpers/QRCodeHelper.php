<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Log;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeHelper
{
    public function generateForUrl($url)
    {
        Log::debug("url#### " . $url);
        $qrcode = QrCode::format('png')
            ->size(500)->errorCorrection('H')
            ->generate($url);
        return $qrcode;
    }
}
