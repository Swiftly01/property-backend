<?php

namespace App\Enums;

enum LocationEnum: string
{
    case ABIA = 'Abia';
    case ADAMAWA = 'Adamawa';
    case AKWA_IBOM = 'Akwa Ibom';
    case ANAMBRA = 'Anambra';
    case BAUCHI = 'Bauchi';
    case BAYELSA = 'Bayelsa';
    case BENUE = 'Benue';
    case BORNO = 'Borno';
    case CROSS_RIVER = 'Cross River';
    case DELTA = 'Delta';
    case EBONYI = 'Ebonyi';
    case EDO = 'Edo';
    case EKITI = 'Ekiti';
    case ENUGU = 'Enugu';
    case GOMBE = 'Gombe';
    case IMO = 'Imo';
    case JIGAWA = 'Jigawa';
    case KADUNA = 'Kaduna';
    case KANO = 'Kano';
    case KATSINA = 'Katsina';
    case KEBBI = 'Kebbi';
    case KOGI = 'Kogi';
    case KWARA = 'Kwara';
    case LAGOS = 'Lagos';
    case NASARAWA = 'Nasarawa';
    case NIGER = 'Niger';
    case OGUN = 'Ogun';
    case ONDO = 'Ondo';
    case OSUN = 'Osun';
    case OYO = 'Oyo';
    case PLATEAU = 'Plateau';
    case RIVERS = 'Rivers';
    case SOKOTO = 'Sokoto';
    case TARABA = 'Taraba';
    case YOBE = 'Yobe';
    case ZAMFARA = 'Zamfara';
    case FCT = 'FCT';


    public function label(): string
    {
        return match($this){
            self::FCT => 'Abuja (FCT)',
            default => $this->value,

        };
    }

    public function values(): array
    {
        return array_column(self::cases(), 'value');
    }
    

    public static function options()
    {
        return array_map(fn($case) =>[
            'label' => $case->label(),
            'value' => $case->values()
        ], self::cases());
    }
}
