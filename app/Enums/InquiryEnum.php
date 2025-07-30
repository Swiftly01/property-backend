<?php

namespace App\Enums;

enum InquiryEnum: string
{
    case BUY = 'buy';
    case SELL = 'sell';
    case RENT = 'rent';

    public function label(): string
    {
        return match ($this) {
            self::BUY => 'Buy',
            self::SELL => 'Sell',
            self::RENT => 'Rent'
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
