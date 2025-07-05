<?php

namespace App\Enums;

enum PropertyTypeEnum: string
{
    case HOUSE = 'house';
    case LAND = 'land';

    public  function label(): string
    {
       return match($this){
        self::HOUSE => 'House',
        self::LAND => 'Land',
       };
    } 

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
