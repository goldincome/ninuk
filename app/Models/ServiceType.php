<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    const NIN_DEFAULT_ID = 1;

    const NIN = 'nin';
    const BVN = 'bvn';
    const BANK_ACCOUNT = 'bank-account';
    const BVN_PERSONAL_BANK_ACCOUNT = 'bvn-personal-bank-account';
    const BVN_CORPORATE_BANK_ACCOUNT = 'bvn-corporate-bank-account';
    const PASSPORT_5_YEARS = 'passport-application-5-years';
    const PASSPORT_10_YEARS = 'passport-application-10-years';
    const NPC_ATTESTATION_BIRTH_CERTIFICATE = 'npc-attestation-birth-certificate';
    const NPC_NOTIFICATION_BIRTH_CERTIFICATE = 'npc-notification-birth-certificate';
    const TAX_IDENTIFICATION_NUMBER = 'tax-identification-number-tax-card';

    protected $fillable = [
        'slug',
        'name',
        'description',

    ];

    public function ourService()
    {
        return $this->hasOne(OurService::class, 'service_type_id');
    }
}
