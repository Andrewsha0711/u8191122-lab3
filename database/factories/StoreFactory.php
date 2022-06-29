<?php

namespace Database\Factories;

use App\Domain\Store\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class StoreFactory extends Factory
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
            'seller' => $this->faker->name,
        ];
    }
    protected $model = Store::class;
}
