<?php

namespace App\Http\Repositories\Settings;

use App\Http\Traits\SettingsTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class SettingsRepository implements SettingsRepositoryInterface{
    use SettingsTrait;
}
