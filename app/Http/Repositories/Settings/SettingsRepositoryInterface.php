<?php

namespace App\Http\Repositories\Settings;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
* Interface SettingRepositoryInterface
* @package App\Repositories
*/
interface SettingsRepositoryInterface
{
    public function GetSetting();
}
