<?php

namespace App\Enums;

enum BuyRequestEnum : string
{  
    case PENDING = 'pending';
    case CONFIRMED = 'confirmed';
    case DECLINED = 'declined';

    public function label(): string
    {
        return match($this){
            self::PENDING => 'pending',
            self::CONFIRMED => 'confirmed',
            self::DECLINED => 'declined',
            
        };
    }


    public static function values()
    {
        return array_column(self::cases(), 'value');
    }
    
}
