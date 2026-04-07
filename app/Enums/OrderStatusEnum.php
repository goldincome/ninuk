<?php
namespace App\Enums;

enum OrderStatusEnum: string
{

    case PENDING = 'pending';
    case CANCELED = 'canceled';
    case PAID = 'paid';

    

    public function customerLabel(): string
    {
        return match ($this) {
            self::PENDING => 'Processing',
            self::CANCELED => 'Order Canceled',
            self::PAID => 'Paid',
        };
    }

    public function adminLabel(): string
    {
        return match ($this) {
            self::PENDING=> 'Processing Payment',
            self::CANCELED => 'Order Canceled',
            self::PAID => 'Payment Made',
        };
    }
   
}
