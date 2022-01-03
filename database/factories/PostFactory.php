<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $paragraphs = $this->faker->paragraphs(5);
        $body = "";
        foreach ($paragraphs as $p) {
            $body = "{$body}<p>{$p}</p>";
        }
        $slug = Str::slug($title = $this->faker->sentence());

        return [
            "title" => $title,
            "body" => $body,
            "image" => "image.jpg",
            "slug" => $slug,
        ];
    }
}
