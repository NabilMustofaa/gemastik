<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partner>
 */
class PartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'user_id' => fake()->unique()->numberBetween(1, 10),
            'birth_date' => fake()->date(),
            'location' => fake()->city(),
            'description' => fake()->text(),
            'instagram_url' => 'https://www.instagram.com/'.fake()->userName(),
            'image'=>'('.fake()->numberBetween(1, 10).').jpg'


        ];
    }
}
