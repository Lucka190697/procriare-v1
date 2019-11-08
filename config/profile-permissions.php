<?php
use App\Enums\UserRolesEnum;

return [
    UserRolesEnum::ADMIN => [
        'admin' => ['view', 'create', 'update', 'delete'],
        'user' => ['view', 'create', 'update', 'delete'],
    ],

    UserRolesEnum::CLIENT => [
        'user' => ['view', 'update']
    ]
];
