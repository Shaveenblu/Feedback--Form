<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Tour;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TourControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_tours(): void
    {
        $tours = Tour::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('tours.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.tours.index')
            ->assertViewHas('tours');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_tour(): void
    {
        $response = $this->get(route('tours.create'));

        $response->assertOk()->assertViewIs('app.tours.create');
    }

    /**
     * @test
     */
    public function it_stores_the_tour(): void
    {
        $data = Tour::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('tours.store'), $data);

        $this->assertDatabaseHas('tours', $data);

        $tour = Tour::latest('id')->first();

        $response->assertRedirect(route('tours.edit', $tour));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_tour(): void
    {
        $tour = Tour::factory()->create();

        $response = $this->get(route('tours.show', $tour));

        $response
            ->assertOk()
            ->assertViewIs('app.tours.show')
            ->assertViewHas('tour');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_tour(): void
    {
        $tour = Tour::factory()->create();

        $response = $this->get(route('tours.edit', $tour));

        $response
            ->assertOk()
            ->assertViewIs('app.tours.edit')
            ->assertViewHas('tour');
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

        $response = $this->put(route('tours.update', $tour), $data);

        $data['id'] = $tour->id;

        $this->assertDatabaseHas('tours', $data);

        $response->assertRedirect(route('tours.edit', $tour));
    }

    /**
     * @test
     */
    public function it_deletes_the_tour(): void
    {
        $tour = Tour::factory()->create();

        $response = $this->delete(route('tours.destroy', $tour));

        $response->assertRedirect(route('tours.index'));

        $this->assertModelMissing($tour);
    }
}
