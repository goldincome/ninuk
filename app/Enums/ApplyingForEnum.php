<?php
namespace App\Enums;



enum ApplyingForEnum: string
{

    case CHILDREN = 'children';
    case MYSELF = 'myself';
    case COMPANY = 'company';

    public function label(): string
    {
        return match ($this) {
            self::CHILDREN => 'Children',
            self::MYSELF=> 'Myself',
            self::COMPANY=> 'Company',
        };
      
    }
public static function toArray(): array
  {
    return array_column(self::cases(), 'value');
  }


}