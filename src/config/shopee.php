<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Keys      
    |--------------------------------------------------------------------------
    |
    | 
    | Shopee Open API V2.0 docs.:
    | https://open.shopee.com/documents?module=87&type=2&id=64&version=2
    |
    */

    'partner_id'    => env('SHOPEE_PARTNER_ID'),
    'key'           => env('SHOPEE_KEY'),
    'redirect'      => 'https://500b-177-95-229-183.ngrok.io/shopee/callback',
    'shop_id'       => env('SHOPEE_SHOP_ID'),
    'sandbox'       => env('SHOPEE_SANDBOX', true),
    'host' => [
        'production'  => 'https://partner.shopeemobile.com',
        'sandbox'     => 'https://partner.test-stable.shopeemobile.com',
    ],
];
