<?php
namespace App\Enums;



enum PaymentMethodEnum: string
{

    case Stripe = 'stripe';
    case PayPal = 'paypal';
    case Takepayment = 'takepayment';
    case Offline = 'offline';


    public function label(): string
    {
        return match ($this) {
            self::Stripe => 'Stripe',
            self::PayPal=> 'Paypal',
            self::Takepayment=> 'Takepayment',
            self::Offline=> 'Pay at our Office',
        };
      
    }
public static function toArray(): array
  { 
    return array_column(self::cases(), 'value');
  }


}