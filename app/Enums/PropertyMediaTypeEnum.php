<?php

namespace App\Enums;

enum PropertyMediaTypeEnum : string
{
    case PHOTOGRAPHY = 'photograph';
    case STAGING = 'staging';
    case PODCAST = 'podcast';


    public function label(): string
    {
        return match($this){
            self::PHOTOGRAPHY => 'Photograph',
            self::STAGING => 'Staging',
            self::PODCAST => 'Podcast'

        };
    }


    public static function values() : array
    {
        return array_column(self::cases(), 'value');
    }



}
