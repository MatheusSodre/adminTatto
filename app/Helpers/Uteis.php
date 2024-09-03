<?php


namespace App\Helpers;
class Uteis
{
	public static function resolveResource($resource, bool $assoc = false)
    {
        return json_decode(json_encode($resource), $assoc);
    }
}
