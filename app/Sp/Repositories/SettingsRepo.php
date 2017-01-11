<?php

namespace Sp\Repositories;

use Sp\Models\Settings;

class SettingsRepo
{

    public function save(Settings $settings)
    {
        $settings->save();

        return $settings;
    }

    public function getSettings()
    {
        return Settings::first();
    }
}
