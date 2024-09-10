<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Tour;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TourTest extends TestCase
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
    public function it_gets_tours_list(): void
    {
        $tours = Tour::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.tours.index'));

        $response->assertOk()->assertSee($tours[0]->unique_id);
    }

    /**
     * @test
     */
    public function it_stores_the_tour(): void
    {
        $data = Tour::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.tours.store'), $data);

        $this->assertDatabaseHas('tours', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_tour(): void
    {
        $tour = Tour::factory()->create();

        $data = [
            'unique_id' => $this->faker->unique->text(255),
            'tour_operator' => $this->faker->text(255),
            'tour_name' => $this->faker->text(255),
            'tour_start_date' => $this->faker->date(),
            'tour_no' => $this->faker->text(255),
        ];

        $response = $this->putJson(route('api.tours.update', $tour), $data);

        $data['id'] = $tour->id;

        $this->assertDatabaseHas('tours', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_tour(): void
    {
        $tour = Tour::factory()->create();

        $response = $this->deleteJson(route('api.tours.destroy', $tour));

        $this->assertModelMissing($tour);

        $response->assertNoContent();
    }
}
