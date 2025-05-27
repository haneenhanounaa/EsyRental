<?php

namespace App\Helpers;

use App\Models\Setting;

class SettingsHelper
{
    public static function get($key, $default = null)
    {
        return Setting::where('key', $key)->value('value') ?? $default;
    }

    public static function all(): array
    {
        return Setting::pluck('value', 'key')->toArray();
    }
}
