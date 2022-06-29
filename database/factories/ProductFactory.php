<?php

namespace Database\Factories;

use App\Domain\Product\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(){
        return [
            'name' => $this->faker->sentence,
            'short_description' => $this->faker->sentence,
            'description' => $this->faker->text,
            'actual_price' => $this->faker->randomFloat(2, 100, null),
            'discount' => $this->faker->randomFloat(1, 0, 99),
        ];
    }
    protected $model = Product::class;
}