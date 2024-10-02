<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Hotel;
use App\Models\Customer;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HotelCustomersTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_hotel_customers(): void
    {
        $hotel = Hotel::factory()->create();
        $customer = Customer::factory()->create();

        $hotel->customers()->attach($customer);

        $response = $this->getJson(route('api.hotels.customers.index', $hotel));

        $response->assertOk()->assertSee($customer->customer_name);
    }

    /**
     * @test
     */
    public function it_can_attach_customers_to_hotel(): void
    {
        $hotel = Hotel::factory()->create();
        $customer = Customer::factory()->create();

        $response = $this->postJson(
            route('api.hotels.customers.store', [$hotel, $customer])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $hotel
                ->customers()
                ->where('customers.id', $customer->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_customers_from_hotel(): void
    {
        $hotel = Hotel::factory()->create();
        $customer = Customer::factory()->create();

        $response = $this->deleteJson(
            route('api.hotels.customers.store', [$hotel, $customer])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $hotel
                ->customers()
                ->where('customers.id', $customer->id)
                ->exists()
        );
    }
}
