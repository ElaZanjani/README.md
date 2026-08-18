<?php

namespace App\Http\Traits;

use App\Models\Ayar;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

trait SettingsTrait
{
    public function GetSetting()
    {
        $ayar = Ayar::find(1);
        return $ayar;
    }
    public function SetSetting()
    {
        
    }
}
