<?php

use App\Models\Setting;

function setting($key = null)
{
    $settings = Setting::first();

    if (!$settings) return null;

    return $key ? $settings->$key : $settings;
}