<?php

return [

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    // Ganti IP ini sesuai IP Laravel server kamu
    'allowed_origins' => [
        'http://localhost:5000',       // Flutter web default dev port
        'http://127.0.0.1:5000',
        'http://localhost:8000',
        'http://127.0.0.1:8000',
        'http://192.168.1.15:8000',
        '*', // sementara: izinkan semua
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
