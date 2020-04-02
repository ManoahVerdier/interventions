<?php

use App\Brand;
use Faker\Generator as Faker;
use Uccello\Core\Models\Domain;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'domain_id' => Domain::first()->id
    ];
});
