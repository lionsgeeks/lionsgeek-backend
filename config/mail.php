<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | This option controls the default mailer that is used to send all email
    | messages unless another mailer is explicitly specified when sending
    | the message.
    |
    */
    'default' => env('MAIL_MAILER', 'default'), // Default mailer

    /*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Define all mailers and their respective settings here.
    |
    */
    'mailers' => [

        'default' => [
            'transport' => 'smtp',
            'host' => env('MAIL_HOST', 'smtp.gmail.com'),
            'port' => env('MAIL_PORT', 587),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
        ],

        'Coding' => [
            'transport' => 'smtp',
            'host' => env('MAIL2_HOST', 'smtp.gmail.com'),
            'port' => env('MAIL2_PORT', 587),
            'encryption' => env('MAIL2_ENCRYPTION', 'tls'),
            'username' => env('MAIL2_USERNAME'),
            'password' => env('MAIL2_PASSWORD'),
            'timeout' => null,
        ],

        'Media' => [
            'transport' => 'smtp',
            'host' => env('MAIL3_HOST', 'smtp.gmail.com'),
            'port' => env('MAIL3_PORT', 587),
            'encryption' => env('MAIL3_ENCRYPTION', 'tls'),
            'username' => env('MAIL3_USERNAME'),
            'password' => env('MAIL3_PASSWORD'),
            'timeout' => null,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | The default "from" name and address for outgoing emails. You can set
    | mailer-specific "from" addresses in the environment variables.
    |
    */
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'info@lionsgeek.ma'),
        'name' => env('MAIL_FROM_NAME', 'Lionsgeek'),
    ],
];

