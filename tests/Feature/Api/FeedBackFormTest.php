<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\FeedBackForm;

use App\Models\Tour;
use App\Models\Hotel;
use App\Models\Guide;
use App\Models\Question;
use App\Models\Customer;
use App\Models\ResponseType;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FeedBackFormTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_feed_back_forms_list(): void
    {
        $feedBackForms = FeedBackForm::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.feed-back-forms.index'));

        $response->assertOk()->assertSee($feedBackForms[0]->customer_name);
    }

    /**
     * @test
     */
    public function it_stores_the_feed_back_form(): void
    {
        $data = FeedBackForm::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.feed-back-forms.store'), $data);

        $this->assertDatabaseHas('feed_back_forms', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_feed_back_form(): void
    {
        $feedBackForm = FeedBackForm::factory()->create();

        $question = Question::factory()->create();
        $customer = Customer::factory()->create();
        $responseType = ResponseType::factory()->create();
        $hotel = Hotel::factory()->create();
        $tour = Tour::factory()->create();
        $guide = Guide::factory()->create();

        $data = [
            'customer_name' => $this->faker->text(255),
            'customer_tel_phone_number' => $this->faker->text(255),
            'date' => $this->faker->date(),
            'question_id' => $question->id,
            'customer_id' => $customer->id,
            'response_type_id' => $responseType->id,
            'hotel_id' => $hotel->id,
            'tour_id' => $tour->id,
            'guide_id' => $guide->id,
        ];

        $response = $this->putJson(
            route('api.feed-back-forms.update', $feedBackForm),
            $data
        );

        $data['id'] = $feedBackForm->id;

        $this->assertDatabaseHas('feed_back_forms', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_feed_back_form(): void
    {
        $feedBackForm = FeedBackForm::factory()->create();

        $response = $this->deleteJson(
            route('api.feed-back-forms.destroy', $feedBackForm)
        );

        $this->assertModelMissing($feedBackForm);

        $response->assertNoContent();
    }
}
