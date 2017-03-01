<?php

return [
    'roles' => [
        'user' => 0,
        'admin' => 1,
    ],

    'avatar_default' => '/images/default.png',
    'path_cloud_avatar' => 'KhoaLuan/',
    'user_role' => [
        1 => 'Admin',
        0 => 'User',
    ],
    'status' => [
        1 => 'On',
        2 => 'Off',
        3 => 'Standby',
        4 => 'Unplugged',
        5 => 'Activated',
        6 => 'Deactivated',
    ],
    'user' => [
        'user_limit' => 30,
        'confirmed' => [
            'is_confirm' => 1,
            'not_confirm' => 0,
        ],
        'confirmation_code' => [
            'length' => 10,
        ],
    ],
];
