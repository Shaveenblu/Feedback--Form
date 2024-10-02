<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Tour;
use App\Models\Guide;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TourGuidesTest extends TestCase
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
    public function it_gets_tour_guides(): void
    {
        $tour = Tour::factory()->create();
        $guide = Guide::factory()->create();

        $tour->guides()->attach($guide);

        $response = $this->getJson(route('api.tours.guides.index', $tour));

        $response->assertOk()->assertSee($guide->unique_id);
    }

    /**
     * @test
     */
    public function it_can_attach_guides_to_tour(): void
    {
        $tour = Tour::factory()->create();
        $guide = Guide::factory()->create();

        $response = $this->postJson(
            route('api.tours.guides.store', [$tour, $guide])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $tour
                ->guides()
                ->where('guides.id', $guide->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_guides_from_tour(): void
    {
        $tour = Tour::factory()->create();
        $guide = Guide::factory()->create();

        $response = $this->deleteJson(
            route('api.tours.guides.store', [$tour, $guide])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $tour
                ->guides()
                ->where('guides.id', $guide->id)
                ->exists()
        );
    }
}
