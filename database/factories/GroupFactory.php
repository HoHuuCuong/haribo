<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\AccountGroups;
use Faker\Generator as Faker;

$factory->define(AccountGroups::class, function (Faker $faker) {
    return [
        'name' => 'System Admin'
    ];
});