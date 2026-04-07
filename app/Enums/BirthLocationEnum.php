<?php
namespace App\Enums;



enum BirthLocationEnum: string
{

    case BORN_IN_NIGERIA = 'born_in_nigeria';
    case BORN_OUTSIDE_NIGERIA = 'born_outside_nigeria';
    case BOTH_IN_OUTSIDE_NIGERIA = 'both_in_outside_nigeria';

    public function label(): string
    {
        return match ($this) {
            self::BORN_IN_NIGERIA=> 'Born in Nigeria',
            self::BORN_OUTSIDE_NIGERIA=> 'Born outside Nigeria',
            self::BOTH_IN_OUTSIDE_NIGERIA=> 'Both born in and outside Nigeria',
        };
      
    }
public static function toArray(): array
  {
    return array_column(self::cases(), 'value');
  }


}