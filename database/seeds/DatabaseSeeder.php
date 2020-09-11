<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Uccello\Core\Models\Entity;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(\Uccello\Core\Models\User::class)->make();
        $user->username = 'admin';
        $user->name = 'Admin';
        $user->is_admin = true;
        $user->save();

        // Create uuid
        Entity::create([
            'id' => (string) Str::uuid(),
            'module_id' => ucmodule('user')->id,
            'record_id' => $user->getKey(),
        ]);

        $this->makeBrands();
        $this->makeCategories();

        factory(\App\Product::class, 50)->create();
    }

    protected function makeBrands()
    {
        $brands = ['Rational', 'Unox', 'Convotherm', 'Granuldisk', 'Franstal'];

        foreach ($brands as $name) {
            $brand = factory(\App\Brand::class)->make();
            $brand->name = $name;
            $brand->save();
        }
    }

    protected function makeCategories()
    {
        $categories = [
            'Four' => [
                'Self Cooking Center',
                'Combimaster & Climaplus Combi',
                'Gamme mini 6 à 20 niveaux',
                'Four à sol 20/40 niveaux',
                'Four jusqu\'à 10 niveaux',
            ],

            'Vaisselle' => [
                'Produits nettoyants'
            ]
        ];

        foreach ($categories as $rootName => $subCategories) {
            $rootCategory = factory(\App\Category::class)->make();
            $rootCategory->name = $rootName;
            $rootCategory->save();

            foreach ($subCategories as $name) {
                $category = factory(\App\Category::class)->make();
                $category->name = $name;
                $category->save();
                $category->setChildOf($rootCategory);
            }
        }
    }
}
