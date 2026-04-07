<?php
/**
 * Stripe Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

return [
    'secret'    => env('STRIPE_SECRET', 'stripe_secret'), 
    'key' => env('STRIPE_KEY', 'STRIPE KEY'), 
    'currency'       => env('STRIPE_CURRENCY', 'GBP'),
];
