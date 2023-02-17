<?php

namespace Database\Factories;

use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title_ua' => $this->faker->sentence(random_int(3,8)),
            'title_original' => $this->faker->sentence(random_int(3,8)),
            'year' => random_int(1901, 2022),
            'image_path' => 'images/test.jpg',
            'link_1' => 'https://www.youtube.com/embed/i3WwGPEfB4Y',
            'link_2' => 'https://www.youtube.com/embed/i3WwGPEfB4Y', 
            'is_published' => random_int(0, 1),
            'description' => $this->faker->text(444),
            'type_id' => Type::get()->random()->id,
            
        ];
    }
}
