<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Guide;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GuideTest extends TestCase
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
    public function it_gets_guides_list(): void
    {
        $guides = Guide::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.guides.index'));

        $response->assertOk()->assertSee($guides[0]->unique_id);
    }

    /**
     * @test
     */
    public function it_stores_the_guide(): void
    {
        $data = Guide::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.guides.store'), $data);

        $this->assertDatabaseHas('guides', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(route('api.guides.update', $guide), $data);

        $data['id'] = $guide->id;

        $this->assertDatabaseHas('guides', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_guide(): void
    {
        $guide = Guide::factory()->create();

        $response = $this->deleteJson(route('api.guides.destroy', $guide));

        $this->assertModelMissing($guide);

        $response->assertNoContent();
    }
}
