<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ResponseType;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResponseTypeTest extends TestCase
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
    public function it_gets_response_types_list(): void
    {
        $responseTypes = ResponseType::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.response-types.index'));

        $response->assertOk()->assertSee($responseTypes[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_response_type(): void
    {
        $data = ResponseType::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.response-types.store'), $data);

        $this->assertDatabaseHas('response_types', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_response_type(): void
    {
        $responseType = ResponseType::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'unique_id' => $this->faker->unique->text(255),
        ];

        $response = $this->putJson(
            route('api.response-types.update', $responseType),
            $data
        );

        $data['id'] = $responseType->id;

        $this->assertDatabaseHas('response_types', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_response_type(): void
    {
        $responseType = ResponseType::factory()->create();

        $response = $this->deleteJson(
            route('api.response-types.destroy', $responseType)
        );

        $this->assertModelMissing($responseType);

        $response->assertNoContent();
    }
}
