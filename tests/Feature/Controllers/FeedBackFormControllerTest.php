<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\FeedBackForm;

use App\Models\Tour;
use App\Models\Hotel;
use App\Models\Guide;
use App\Models\Question;
use App\Models\Customer;
use App\Models\ResponseType;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FeedBackFormControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_feed_back_forms(): void
    {
        $feedBackForms = FeedBackForm::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('feed-back-forms.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.feed_back_forms.index')
            ->assertViewHas('feedBackForms');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_feed_back_form(): void
    {
        $response = $this->get(route('feed-back-forms.create'));

        $response->assertOk()->assertViewIs('app.feed_back_forms.create');
    }

    /**
     * @test
     */
    public function it_stores_the_feed_back_form(): void
    {
        $data = FeedBackForm::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('feed-back-forms.store'), $data);

        $this->assertDatabaseHas('feed_back_forms', $data);

        $feedBackForm = FeedBackForm::latest('id')->first();

        $response->assertRedirect(route('feed-back-forms.edit', $feedBackForm));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_feed_back_form(): void
    {
        $feedBackForm = FeedBackForm::factory()->create();

        $response = $this->get(route('feed-back-forms.show', $feedBackForm));

        $response
            ->assertOk()
            ->assertViewIs('app.feed_back_forms.show')
            ->assertViewHas('feedBackForm');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_feed_back_form(): void
    {
        $feedBackForm = FeedBackForm::factory()->create();

        $response = $this->get(route('feed-back-forms.edit', $feedBackForm));

        $response
            ->assertOk()
            ->assertViewIs('app.feed_back_forms.edit')
            ->assertViewHas('feedBackForm');
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

        $response = $this->put(
            route('feed-back-forms.update', $feedBackForm),
            $data
        );

        $data['id'] = $feedBackForm->id;

        $this->assertDatabaseHas('feed_back_forms', $data);

        $response->assertRedirect(route('feed-back-forms.edit', $feedBackForm));
    }

    /**
     * @test
     */
    public function it_deletes_the_feed_back_form(): void
    {
        $feedBackForm = FeedBackForm::factory()->create();

        $response = $this->delete(
            route('feed-back-forms.destroy', $feedBackForm)
        );

        $response->assertRedirect(route('feed-back-forms.index'));

        $this->assertModelMissing($feedBackForm);
    }
}
