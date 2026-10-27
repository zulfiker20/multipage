<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

if (!function_exists('get_settings')) {
    function get_settings()
    {
        return Cache::remember('site_settings', 1440, function () {
            return Setting::first();
        });
    }
}
