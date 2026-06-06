<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        $title = $this->faker->sentence(3, true);
        return [
            'title'             => rtrim($title, '.'),
            'slug'              => Str::slug($title) . '-' . $this->faker->unique()->numberBetween(1, 999),
            'short_description' => $this->faker->sentence(12),
            'full_description'  => $this->faker->paragraphs(4, true),
            'client_name'       => $this->faker->company(),
            'project_date'      => $this->faker->dateTimeBetween('-2 years', 'now'),
            'project_url'       => $this->faker->url(),
            'category'          => $this->faker->randomElement(['Web App', 'Mobile App', 'Cloud', 'E-Commerce', 'Landing Page']),
            'technologies'      => $this->faker->randomElements(['Laravel', 'React', 'Vue', 'Flutter', 'MySQL', 'PostgreSQL', 'AWS'], 3),
            'status'            => $this->faker->randomElement(['published', 'draft']),
            'is_featured'       => $this->faker->boolean(30),
            'meta_title'        => $this->faker->sentence(5),
            'meta_description'  => $this->faker->sentence(15),
            'meta_keywords'     => implode(', ', $this->faker->words(5)),
        ];
    }

    public function published(): static
    {
        return $this->state(fn() => ['status' => 'published']);
    }

    public function featured(): static
    {
        return $this->state(fn() => ['is_featured' => true, 'status' => 'published']);
    }
}
