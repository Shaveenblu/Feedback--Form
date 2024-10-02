<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\FeedBackForm;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedBackFormFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FeedBackForm::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_name' => $this->faker->text(255),
            'customer_tel_phone_number' => $this->faker->text(255),
            'date' => $this->faker->date(),
            'question_id' => \App\Models\Question::factory(),
            'customer_id' => \App\Models\Customer::factory(),
            'response_type_id' => \App\Models\ResponseType::factory(),
            'hotel_id' => \App\Models\Hotel::factory(),
            'tour_id' => \App\Models\Tour::factory(),
            'guide_id' => \App\Models\Guide::factory(),
        ];
    }
}
