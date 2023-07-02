<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Language;
use Faker\Generator as Faker;

$factory->define(Language::class, function (Faker $faker) {
    return [
        'name' => 'Tiếng Việt',
        'code' => 'vi',
        'flag' => 'header/header-lang-flags/vi.jpg',
        'default' => 1
    ];
});