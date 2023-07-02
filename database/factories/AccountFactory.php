<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Accounts;
use Faker\Generator as Faker;

$factory->define(Accounts::class, function (Faker $faker) {
    return [
        'name' => 'Hieu Dev',
        'username' => 'admin',
        'email' => 'admin_' . time() . '@admin.com',
        'phone' => '0987654321',
        'password' => '$2y$10$Jq.Z72ov2jxYvYQj6cmtIepl5WGGsbGcvjkrp3Wf..09DAYfcOYP6', // 111111
        'remember_token' => Str::random(10),
        'group_id' => 1
    ];
});