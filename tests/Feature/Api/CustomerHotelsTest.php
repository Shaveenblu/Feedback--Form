<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Hotel;
use App\Models\Customer;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerHotelsTest extends TestCase
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
    public function it_gets_customer_hotels(): void
    {
        $customer = Customer::factory()->create();
        $hotel = Hotel::factory()->create();

        $customer->hotels()->attach($hotel);

        $response = $this->getJson(
            route('api.customers.hotels.index', $customer)
        );

        $response->assertOk()->assertSee($hotel->hotel_name);
    }

    /**
     * @test
     */
    public function it_can_attach_hotels_to_customer(): void
    {
        $customer = Customer::factory()->create();
        $hotel = Hotel::factory()->create();

        $response = $this->postJson(
            route('api.customers.hotels.store', [$customer, $hotel])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $customer
                ->hotels()
                ->where('hotels.id', $hotel->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_hotels_from_customer(): void
    {
        $customer = Customer::factory()->create();
        $hotel = Hotel::factory()->create();

        $response = $this->deleteJson(
            route('api.customers.hotels.store', [$customer, $hotel])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $customer
                ->hotels()
                ->where('hotels.id', $hotel->id)
                ->exists()
        );
    }
}
