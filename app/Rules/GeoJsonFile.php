<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class GeoJsonFile implements Rule
{
    public function passes($attribute, $value)
    {
        // Memeriksa apakah file adalah GeoJSON
        $extension = strtolower($value->getClientOriginalExtension());
        return $extension === 'geojson';
    }

    public function message()
    {
        return 'File harus berupa format GeoJSON.';
    }
}
