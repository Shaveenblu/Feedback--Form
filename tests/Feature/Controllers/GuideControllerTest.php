<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Guide;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GuideControllerTest extends TestCase
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
    public function it_displays_index_view_with_guides(): void
    {
        $guides = Guide::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('guides.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.guides.index')
            ->assertViewHas('guides');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_guide(): void
    {
        $response = $this->get(route('guides.create'));

        $response->assertOk()->assertViewIs('app.guides.create');
    }

    /**
     * @test
     */
    public function it_stores_the_guide(): void
    {
        $data = Guide::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('guides.store'), $data);

        $this->assertDatabaseHas('guides', $data);

        $guide = Guide::latest('id')->first();

        $response->assertRedirect(route('guides.edit', $guide));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_guide(): void
    {
        $guide = Guide::factory()->create();

        $response = $this->get(route('guides.show', $guide));

        $response
            ->assertOk()
            ->assertViewIs('app.guides.show')
            ->assertViewHas('guide');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_guide(): void
    {
        $guide = Guide::factory()->create();

        $response = $this->get(route('guides.edit', $guide));

        $response
            ->assertOk()
            ->assertViewIs('app.guides.edit')
            ->assertViewHas('guide');
    }

    /**
     * @test
     */
    public function it_updates_the_guide(): void
    {
        $guide = Guide::factory()->create();

        $data = [
            'unique_id' => $this->faker->unique->text(255),
            'guid_first_name' => $this->faker->text(255),
            'guid_last_name' => $this->faker->text(255),
        ];

        $response = $this->put(route('guides.update', $guide), $data);

        $data['id'] = $guide->id;

        $this->assertDatabaseHas('guides', $data);

        $response->assertRedirect(route('guides.edit', $guide));
    }

    /**
     * @test
     */
    public function it_deletes_the_guide(): void
    {
        $guide = Guide::factory()->create();

        $response = $this->delete(route('guides.destroy', $guide));

        $response->assertRedirect(route('guides.index'));

        $this->assertModelMissing($guide);
    }
}
