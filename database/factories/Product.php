<?php

use App\Brand;
use App\Category;
use App\Product;
use Faker\Generator as Faker;
use Uccello\Core\Models\Domain;

$factory->define(Product::class, function (Faker $faker) {
    $brandsCount = Brand::count();
    $categoriesCount = Category::count();
    $hasDiscount = rand(0, 3) === 0;

    return [
        'name' => $faker->word,
        'reference' => rand(1000, 99999),
        // 'image' => $faker->image('public/storage/uccello', 640, 480, null, false),
        'category_id' => rand(1, $categoriesCount-1),
        'brand_id' => rand(1, $brandsCount-1),
        'short_description' => $faker->paragraph(1),
        'description' => $faker->paragraph(20),
        'price' => rand(10, 200),
        'discount' => $hasDiscount ? $faker->randomElement([10, 20, 30, 40, 50]) : null,
        'quantity' => $faker->randomElement(['1 litre', '10 capsules', '10 kg']),
        'domain_id' => Domain::first()->id
    ];
});
