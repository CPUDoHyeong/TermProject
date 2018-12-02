<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'google' => [
        'client_id' => '453226793275-qb8bd12820tq6492n8lt2rtrt3hjmfuh.apps.googleusercontent.com',
        'client_secret' => 'ko6lASEuXPW12Eauaom7wh5G',
        'redirect' => 'http://dohyeong.site/callback'
    ],
    'facebook' => [
        'client_id' => '329710751093434',
        'client_secret' => '06d71282f17e9e7a8e8b0b788d8d2cd1',
        'redirect' => 'http://dohyeong.site/callback',
    ],
    'github' => [
        'client_id' => env('GITHUB_ID'),
        'client_secret' => env('GITHUB_SECRET'),
        'redirect' => env('GITHUB_CALLBACK'),
    ],
];
