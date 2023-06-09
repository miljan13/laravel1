<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ski>
 */
class SkiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'model'=>$this->faker->word(),
            'color'=>$this->faker->word(),
            'length'=>$this->faker->numberBetween(150,190),
            'brand_id'=>Brand::factory(),
            'type_id'=>$this->faker->numberBetween(1,4),
            'user_id'=>User::factory()
        ];
    }
}
