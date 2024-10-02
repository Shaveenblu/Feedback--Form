<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Tour;
use App\Models\Guide;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GuideToursTest extends TestCase
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
    public function it_gets_guide_tours(): void
    {
        $guide = Guide::factory()->create();
        $tour = Tour::factory()->create();

        $guide->tours()->attach($tour);

        $response = $this->getJson(route('api.guides.tours.index', $guide));

        $response->assertOk()->assertSee($tour->unique_id);
    }

    /**
     * @test
     */
    public function it_can_attach_tours_to_guide(): void
    {
        $guide = Guide::factory()->create();
        $tour = Tour::factory()->create();

        $response = $this->postJson(
            route('api.guides.tours.store', [$guide, $tour])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $guide
                ->tours()
                ->where('tours.id', $tour->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_tours_from_guide(): void
    {
        $guide = Guide::factory()->create();
        $tour = Tour::factory()->create();

        $response = $this->deleteJson(
            route('api.guides.tours.store', [$guide, $tour])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $guide
                ->tours()
                ->where('tours.id', $tour->id)
                ->exists()
        );
    }
}
