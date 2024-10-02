<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hotel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hotel_name' => $this->faker->text(255),
            'hotel_place' => $this->faker->text(255),
            'unique_id' => $this->faker->unique->text(255),
        ];
    }
}
