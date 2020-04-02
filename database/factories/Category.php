<?php

use App\Category;
use Faker\Generator as Faker;
use Uccello\Core\Models\Domain;

$factory->define(Category::class, function (Faker $faker) {
    $categoriesCount = Category::count();
    $hasCategories = $categoriesCount > 0;
    $linkToParentCategory = $hasCategories && rand(0, 1) === 1;

    return [
        'name' => $faker->word,
        'parent_id' => $linkToParentCategory ? rand(1, $categoriesCount-1) : null,
        'domain_id' => Domain::first()->id
    ];
});
