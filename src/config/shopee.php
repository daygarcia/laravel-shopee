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

    'partner_id'    => env('SHOPEE_APP_ID'),
    'key'           => env('SHOPEE_CLIENT_SECRET'),
    'redirect'      => 'https://500b-177-95-229-183.ngrok.io/shopee/callback',
    'site_id'       => env('SHOPEE_SITE_ID'),
    'sandbox'       => env('SHOPEE_SANDBOX', true),
    'host' => [
        'production_url'  => 'https://partner.shopeemobile.com/api/v2/',
        'sandbox_url'     => 'https://partner.test-stable.shopeemobile.com/api/v2/',
    ],
];
