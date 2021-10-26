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
    'google' => [
        'client_id' => '116909384712-h7u0l3ol3l3tels5bv6n2iiidbsn350i.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/callback'
    ],
    'facebook' => [
        'client_id' => '170639475266844',
        'client_secret' => 'b354ad5e2c20d6a01b9f364b9a983ec4',
        'redirect' => 'http://localhost:8000/facebook/callback'
    ],
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

];
