<?php

return [
    'debug' => true, // set false to run on live khalti url
    'website_url' => 'http://localhost:8000/', // your website url
    'public_key' => env('KHALTI_PUBLIC_KEY', 'e45a49806d9246dda4488ce74c58bd1f'), // public key from khalti
    'secret_key' => env('KHALTI_SECRET_KEY', 'efa5a223c46c414ca1c521d4c4ff59cd'), // secret key from khalti
];
