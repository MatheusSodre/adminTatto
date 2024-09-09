<?php

use App\Enums\ServicosStatusEnum;

if (!function_exists('getStatusServicos')) {
    function getStatusServicos(string $status): string
    {
       return ServicosStatusEnum::fromValue($status);
    }
}
if (!function_exists('getServicosName')) {
function getServicosName(string $status)
    {
        return ServicosStatusEnum::tryFromValue($status);
    }
}
