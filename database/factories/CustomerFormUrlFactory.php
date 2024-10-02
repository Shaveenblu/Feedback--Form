<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\CustomerFormUrl;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFormUrlFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CustomerFormUrl::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url_link' => $this->faker->text(255),
            'unique_id' => $this->faker->unique->text(255),
            'status' => 'Completed',
            'date' => $this->faker->date(),
            'other_details' => $this->faker->text(255),
            'customer_id' => \App\Models\Customer::factory(),
            'tour_id' => \App\Models\Tour::factory(),
        ];
    }
}
