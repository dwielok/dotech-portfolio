<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    protected $model = Testimonial::class;

    public function definition(): array
    {
        return [
            'client_name'  => $this->faker->name(),
            'company_name' => $this->faker->company(),
            'position'     => $this->faker->jobTitle(),
            'testimonial'  => $this->faker->paragraph(3),
            'rating'       => $this->faker->numberBetween(4, 5),
            'is_active'    => true,
            'sort_order'   => $this->faker->numberBetween(1, 100),
        ];
    }
}
