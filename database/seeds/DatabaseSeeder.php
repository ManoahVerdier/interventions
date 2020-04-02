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

        factory(\App\Brand::class, 40)->create();
        factory(\App\Category::class, 10)->create();
        factory(\App\Product::class, 50)->create();
    }
}
