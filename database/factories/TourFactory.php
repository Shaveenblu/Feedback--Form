<?php

namespace Database\Factories;

use App\Models\Tour;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TourFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tour::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'unique_id' => $this->faker->unique->text(255),
            'tour_operator' => $this->faker->text(255),
            'tour_name' => $this->faker->text(255),
            'tour_start_date' => $this->faker->date(),
            'tour_no' => $this->faker->text(255),
        ];
    }
}
