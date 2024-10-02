<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\CustomerFormUrl;

use App\Models\Tour;
use App\Models\Customer;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerFormUrlControllerTest extends TestCase
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
    public function it_displays_index_view_with_customer_form_urls(): void
    {
        $customerFormUrls = CustomerFormUrl::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('customer-form-urls.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.customer_form_urls.index')
            ->assertViewHas('customerFormUrls');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_customer_form_url(): void
    {
        $response = $this->get(route('customer-form-urls.create'));

        $response->assertOk()->assertViewIs('app.customer_form_urls.create');
    }

    /**
     * @test
     */
    public function it_stores_the_customer_form_url(): void
    {
        $data = CustomerFormUrl::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('customer-form-urls.store'), $data);

        $this->assertDatabaseHas('customer_form_urls', $data);

        $customerFormUrl = CustomerFormUrl::latest('id')->first();

        $response->assertRedirect(
            route('customer-form-urls.edit', $customerFormUrl)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_customer_form_url(): void
    {
        $customerFormUrl = CustomerFormUrl::factory()->create();

        $response = $this->get(
            route('customer-form-urls.show', $customerFormUrl)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.customer_form_urls.show')
            ->assertViewHas('customerFormUrl');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_customer_form_url(): void
    {
        $customerFormUrl = CustomerFormUrl::factory()->create();

        $response = $this->get(
            route('customer-form-urls.edit', $customerFormUrl)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.customer_form_urls.edit')
            ->assertViewHas('customerFormUrl');
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

        $response = $this->put(
            route('customer-form-urls.update', $customerFormUrl),
            $data
        );

        $data['id'] = $customerFormUrl->id;

        $this->assertDatabaseHas('customer_form_urls', $data);

        $response->assertRedirect(
            route('customer-form-urls.edit', $customerFormUrl)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_customer_form_url(): void
    {
        $customerFormUrl = CustomerFormUrl::factory()->create();

        $response = $this->delete(
            route('customer-form-urls.destroy', $customerFormUrl)
        );

        $response->assertRedirect(route('customer-form-urls.index'));

        $this->assertModelMissing($customerFormUrl);
    }
}
