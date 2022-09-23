<?php

namespace App\Traits;

trait CheckEuropeCountry
{
    function checkEuropeCountry(string $countryCode) {

        $countryCodes = array(
            'AT', 'BE', 'BG', 'CY', 'CZ', 'DE', 'DK', 'EE', 'EL',
            'ES', 'FI', 'FR', 'GR', 'HR', 'HU', 'IE', 'IT', 'LT', 'LU', 'LV',
            'MT', 'NL', 'PL', 'PT', 'RO', 'SE', 'SI', 'SK'
        );

        return (in_array($countryCode, $countryCodes));
    }
}
