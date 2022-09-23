<?php

namespace App\Traits;

trait Claimable
{
    function canceled(int $days) {

        return $days <= 14;
    }

    function delayed(int $hours) {

        return $hours >= 3;
    }
}
