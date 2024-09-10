<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ResponseType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResponseTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ResponseType::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'unique_id' => $this->faker->unique->text(255),
        ];
    }
}
