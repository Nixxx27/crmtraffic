<?php

return [
    'nmi' => [
        'query_endpoint' => env('NMI_QUERY_URL', 'https://secure.networkmerchants.com/api/query.php'),
        'direct_post_endpoint' => env('NMI_DIRECT_POST_URL', 'https://secure.nmi.com/api/transact.php'),
        'username' => env('NMI_USERNAME'),
        'password' => env('NMI_PASSWORD'),
        'secret_key' => env('NMI_SECRET_KEY'),
        'version' =>  env('NMI_API_VERSION', '/v1')
    ],
];
