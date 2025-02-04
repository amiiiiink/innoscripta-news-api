<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;


class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(3, true),
            'description' => $this->faker->text(200),
            'url' => $this->faker->url,
            'url_to_image' => $this->faker->imageUrl,
            'published_at' => $this->faker->dateTime,
            'source' => $this->faker->company,
            'author' => $this->faker->name,
            'category' => $this->faker->word,
        ];
    }
}
