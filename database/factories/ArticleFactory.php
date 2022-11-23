<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $types = $this->faker->randomElements(['news', 'article'], 1);
        $title = $this->faker->sentence(3);
        $body = $this->faker->paragraph(3);

        return [
            'title' => $title,
            'body' => $body,
            'type' => $types[0],
        ];

    
    }
}
