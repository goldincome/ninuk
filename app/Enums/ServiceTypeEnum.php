<?php
namespace App\Enums;



enum ServiceTypeEnum: string
{
    case NIN = 'nin';
    case BVN = 'bvn';
    case BANK_ACCOUNT = 'bank-account';
    case BVN_PERSONAL_BANK_ACCOUNT = 'bvn-personal-bank-account';
    case BVN_CORPORATE_BANK_ACCOUNT = 'bvn-corporate-bank-account';
    case PASSPORT_APPLICATION_5_YEARS = 'passport-application-5-years';
    case PASSPORT_APPLICATION_10_YEARS = 'passport-application-10-years';
    case NPC_ATTESTATION_BIRTH_CERTIFICATE = 'npc-attestation-birth-certificate';
    case AFFIDAVIT_FOR_BIRTH_CERTIFICATE = 'affidavit-for-birth-certificate';





    public function label(): string
    {
        return match ($this) {
            self::NIN => 'NIN',
            self::BVN => 'BVN',
            self::BANK_ACCOUNT => 'Bank Account',
            self::BVN_PERSONAL_BANK_ACCOUNT => 'BVN and Personal Bank Account',
            self::BVN_CORPORATE_BANK_ACCOUNT => 'BVN and Corporate Bank Account',
            self::PASSPORT_APPLICATION_5_YEARS => 'Nigerian Passport Application 5 Years Booklet',
            self::PASSPORT_APPLICATION_10_YEARS => 'Nigerian Passport Application 10 Years Booklet',
            self::NPC_ATTESTATION_BIRTH_CERTIFICATE => 'NPC Attestation Birth Certificate',
            self::AFFIDAVIT_FOR_BIRTH_CERTIFICATE => 'Affidavit for Birth Certificate',
        };
      
    }
  public static function toArray(): array
  {
    return array_column(self::cases(), 'value');
  }


}