<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CustomerFormUrl;

use App\Models\Tour;
use App\Models\Customer;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerFormUrlTest extends TestCase
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
    public function it_gets_customer_form_urls_list(): void
    {
        $customerFormUrls = CustomerFormUrl::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.customer-form-urls.index'));

        $response->assertOk()->assertSee($customerFormUrls[0]->url_link);
    }

    /**
     * @test
     */
    public function it_stores_the_customer_form_url(): void
    {
        $data = CustomerFormUrl::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.customer-form-urls.store'),
            $data
        );

        $this->assertDatabaseHas('customer_form_urls', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_customer_form_url(): void
    {
        $customerFormUrl = CustomerFormUrl::factory()->create();

        $customer = Customer::factory()->create();
        $tour = Tour::factory()->create();

        $data = [
            'url_link' => $this->faker->text(255),
            'unique_id' => $this->faker->unique->text(255),
            'status' => 'Completed',
            'date' => $this->faker->date(),
            'other_details' => $this->faker->text(255),
            'customer_id' => $customer->id,
            'tour_id' => $tour->id,
        ];

        $response = $this->putJson(
            route('api.customer-form-urls.update', $customerFormUrl),
            $data
        );

        $data['id'] = $customerFormUrl->id;

        $this->assertDatabaseHas('customer_form_urls', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_customer_form_url(): void
    {
        $customerFormUrl = CustomerFormUrl::factory()->create();

        $response = $this->deleteJson(
            route('api.customer-form-urls.destroy', $customerFormUrl)
        );

        $this->assertModelMissing($customerFormUrl);

        $response->assertNoContent();
    }
}
