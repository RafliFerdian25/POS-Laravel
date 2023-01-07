<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Merk;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();
        Category::factory(5)->create();
        Merk::factory(5)->create();
        Product::factory(100)->create();
    }
}