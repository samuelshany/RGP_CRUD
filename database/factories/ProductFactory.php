<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_en' => $this->faker->word,
            'name_ar' => $this->faker->word,
            'description_en' => $this->faker->word,
            'description_ar' => $this->faker->word,
            'price' => random_int(1,10),
            'quantity' => random_int(1,10),
            'photo'=>'images/products/86311713566704.png'
        ];
    }
}
