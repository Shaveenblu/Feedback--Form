<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Hotel;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HotelTest extends TestCase
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
    public function it_gets_hotels_list(): void
    {
        $hotels = Hotel::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.hotels.index'));

        $response->assertOk()->assertSee($hotels[0]->hotel_name);
    }

    /**
     * @test
     */
    public function it_stores_the_hotel(): void
    {
        $data = Hotel::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.hotels.store'), $data);

        $this->assertDatabaseHas('hotels', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_hotel(): void
    {
        $hotel = Hotel::factory()->create();

        $data = [
            'hotel_name' => $this->faker->text(255),
            'hotel_place' => $this->faker->text(255),
            'unique_id' => $this->faker->unique->text(255),
        ];

        $response = $this->putJson(route('api.hotels.update', $hotel), $data);

        $data['id'] = $hotel->id;

        $this->assertDatabaseHas('hotels', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_hotel(): void
    {
        $hotel = Hotel::factory()->create();

        $response = $this->deleteJson(route('api.hotels.destroy', $hotel));

        $this->assertModelMissing($hotel);

        $response->assertNoContent();
    }
}
