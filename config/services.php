<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
//facbook
    'facebook' => [
    'client_id' => '801060457415611', //client face của bạn
    'client_secret' => '9d35cbe191b856d1526c724ee0eb8040', //client app service face của bạn
    'redirect' => 'http://localhost/dientularavel/callback' //callback trả về
 ],
    // 'facebook' => [
    //     'client_id' => env('801060457415611'),
    //     'client_secret' => env('9d35cbe191b856d1526c724ee0eb8040'),
    //     'redirect' => env('http://localhost/dientularavel/admin/callback'),
    // ],

];
