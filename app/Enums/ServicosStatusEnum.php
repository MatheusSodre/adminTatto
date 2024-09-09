<?php
namespace App\Enums;

enum ServicosStatusEnum: string
{
    case S = 'Segurança';
    case F = 'Facilities';
    case P = 'Patrimonial';

    public static function fromValue(string $servicos): string
    {
        foreach (self::cases() as $value) {
            if ($value->name === $servicos) {
                return $value->value;
            }
        }
        throw new \ValueError("$servicos Não é valido");

    }

    public static function tryFromValue(string $args)
    {
        $resul = null;
        foreach (self::cases() as $servicos){

            if(strpos($servicos->value, $args)){
                $resul = $servicos->name;
            }
        }
        dd($resul);
        return null;
    }
}

