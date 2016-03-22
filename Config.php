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
                'key'   => '',
                'secret'    => ''
            ],
            'region'    => '',
            'version'   => 'latest',
            'bucket'    => ''
        ],

        /* Cache filesystem */
        'cache' => [
            'credentials'   => [
                'key'   => '',
                'secret'    => ''
            ],
            'region'    => '',
            'version'   => 'latest',
            'bucket'    => ''
        ]
    ],

    'base_url'              => '',
    'source_path_prefix'    => 'source',
    'cache_path_prefix'     => 'cache',
    'group_cache_in_folders'    => true,
    'signkey'               => 'lPSJjVjm//Ts2715OjAJ+pUPRX5gc2bZM7MRfW8BD+Ds18lTlnlEW++u2xZY2lLssBtxkg7ehiy3oi9iOUH75NDU/6IX3O9/XmFVI47j+eKIhCXP1QO2C9T1UwGzw82ejjtz627fP0bCEKEstasmEASoxYZkdWzuuo4RAZsnDBE=',
    'defaults'  =>  [
        'w' =>  1000,
        'h' =>  1000
    ]
];