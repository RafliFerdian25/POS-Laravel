<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'id' => $this->faker->unique()->numberBetween(1000000000000, 9999999999999),
            'category_id' => substr(Category::all()->random()->name,0,3),
            'merk_id' => $this->faker->numberBetween(1, 5),
            'name' => $this->faker->name(),
            'unit' => $this->faker->randomElement(['pcs', 'box', 'pack']),
            'contain' => 1,
            'purchase_price' => $this->faker->numberBetween(1000, 100000),
            'selling_price' => $this->faker->numberBetween(1000, 100000),
            'wholesale_price' => $this->faker->numberBetween(1000, 100000),
            'expired_date' => $this->faker->date('Y-m-d', 'now'),
            'stock' => $this->faker->numberBetween(1, 100),
            'discount' => 0,
        ];
    }
}