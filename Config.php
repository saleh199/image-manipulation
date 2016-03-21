<?php
/**
 * Created by PhpStorm.
 * User: saleh
 * Date: 3/21/16
 * Time: 3:49 PM
 */

return [
    's3'    => [
        /* Source filesystem */
        'source' => [
            'credentials'   => [
                'key'   => 'AKIAI67QKS3CUBK7A2QA',
                'secret'    => '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'
            ],
            'region'    => 'us-east-1',
            'version'   => 'latest',
            'bucket'    => 'development-overestate'
        ],

        /* Cache filesystem */
        'cache' => [
            'credentials'   => [
                'key'   => 'AKIAI67QKS3CUBK7A2QA',
                'secret'    => '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'
            ],
            'region'    => 'us-east-1',
            'version'   => 'latest',
            'bucket'    => 'development-overestate'
        ]
    ],

    'base_url'              => '',
    'source_path_prefix'    => 'source',
    'cache_path_prefix'     => 'cache',
    'group_cache_in_folders'    => true,
    'signkey'               => 'lPSJjVjm//Ts2715OjAJ+pUPRX5gc2bZM7MRfW8BD+Ds18lTlnlEW++u2xZY2lLssBtxkg7ehiy3oi9iOUH75NDU/6IX3O9/XmFVI47j+eKIhCXP1QO2C9T1UwGzw82ejjtz627fP0bCEKEstasmEASoxYZkdWzuuo4RAZsnDBE='
];