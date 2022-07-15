<?php

return [
    'secret_id'          => env('TENCENT_SECRET_ID'),
    'secret_key'         => env('TENCENT_SECRET_KEY'),
    'captcha_app_id'     => env('TENCENT_CAPTCHA_APP_ID', ''),
    'captcha_secret_key' => env('TENCENT_CAPTCHA_SECRET_KEY', ''),
    'region'             => env('TENCENT_CAPTCHA_REGION', 'ap-beijing'),
];
