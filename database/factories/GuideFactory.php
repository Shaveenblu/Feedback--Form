<?php

namespace Database\Factories;

use App\Models\Guide;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuideFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Guide::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'unique_id' => $this->faker->unique->text(255),
            'guid_first_name' => $this->faker->text(255),
            'guid_last_name' => $this->faker->text(255),
        ];
    }
}
