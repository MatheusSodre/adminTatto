<?php

use App\Enums\ServicosStatusEnum;

if (!function_exists('getStatusServicos')) {
    function getStatusServicos(string $status): string
    {
       return ServicosStatusEnum::fromValue($status);
    }

}

