<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ResponseType;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResponseTypeControllerTest extends TestCase
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
    public function it_displays_index_view_with_response_types(): void
    {
        $responseTypes = ResponseType::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('response-types.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.response_types.index')
            ->assertViewHas('responseTypes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_response_type(): void
    {
        $response = $this->get(route('response-types.create'));

        $response->assertOk()->assertViewIs('app.response_types.create');
    }

    /**
     * @test
     */
    public function it_stores_the_response_type(): void
    {
        $data = ResponseType::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('response-types.store'), $data);

        $this->assertDatabaseHas('response_types', $data);

        $responseType = ResponseType::latest('id')->first();

        $response->assertRedirect(route('response-types.edit', $responseType));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_response_type(): void
    {
        $responseType = ResponseType::factory()->create();

        $response = $this->get(route('response-types.show', $responseType));

        $response
            ->assertOk()
            ->assertViewIs('app.response_types.show')
            ->assertViewHas('responseType');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_response_type(): void
    {
        $responseType = ResponseType::factory()->create();

        $response = $this->get(route('response-types.edit', $responseType));

        $response
            ->assertOk()
            ->assertViewIs('app.response_types.edit')
            ->assertViewHas('responseType');
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

        $response = $this->put(
            route('response-types.update', $responseType),
            $data
        );

        $data['id'] = $responseType->id;

        $this->assertDatabaseHas('response_types', $data);

        $response->assertRedirect(route('response-types.edit', $responseType));
    }

    /**
     * @test
     */
    public function it_deletes_the_response_type(): void
    {
        $responseType = ResponseType::factory()->create();

        $response = $this->delete(
            route('response-types.destroy', $responseType)
        );

        $response->assertRedirect(route('response-types.index'));

        $this->assertModelMissing($responseType);
    }
}
