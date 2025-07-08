<?php

namespace App\Enums;

enum PropertyStatusEnum: string
{
    case AVAILABLE = 'available';
    case SOLD = 'sold';

    public function label()
    {
        return match($this){
            self::AVAILABLE => 'Available',
            self::SOLD => 'Sold',

        };
    }


    public static function values()
    {
        return array_column(self::cases(), 'values');

    }


}
