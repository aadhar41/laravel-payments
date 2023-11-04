<?php

return [
    'sellerId'      => env('TWO_CHECKOUT_SELLER_ID'), // REQUIRED
    'secretKey'     => env('TWO_CHECKOUT_SECRET_KEY'), // REQUIRED
    'jwtExpireTime' => env('TWO_CHECKOUT_JWT_EXPIRE_TIME', 30),
    'curlVerifySsl' => env('TWO_CHECKOUT_CURL_VERIFY_URL', 1),
];
