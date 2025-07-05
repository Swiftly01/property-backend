<?php

namespace App\Enums;

enum SellRequestStatusEnum: string
{
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';


    public function label():string
    {
        return match($this){
            self::PENDING => 'under review',
            self::APPROVED => 'listed',
            self::REJECTED => 'declined',
        };
    }

    
    public static function values(): array
    {
        return array_column(Self::cases(), 'value');
    }
    
    public static function options(): array
    {
        return array_combine(self::values(), array_map(fn($case) => $case->label(), self::cases()));
    }


}
