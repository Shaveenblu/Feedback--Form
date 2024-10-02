<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\QuestionCategory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionCategoryTest extends TestCase
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
    public function it_gets_question_categories_list(): void
    {
        $questionCategories = QuestionCategory::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.question-categories.index'));

        $response->assertOk()->assertSee($questionCategories[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_question_category(): void
    {
        $data = QuestionCategory::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.question-categories.store'),
            $data
        );

        $this->assertDatabaseHas('question_categories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_question_category(): void
    {
        $questionCategory = QuestionCategory::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'unique_id' => $this->faker->unique->text(255),
        ];

        $response = $this->putJson(
            route('api.question-categories.update', $questionCategory),
            $data
        );

        $data['id'] = $questionCategory->id;

        $this->assertDatabaseHas('question_categories', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_question_category(): void
    {
        $questionCategory = QuestionCategory::factory()->create();

        $response = $this->deleteJson(
            route('api.question-categories.destroy', $questionCategory)
        );

        $this->assertModelMissing($questionCategory);

        $response->assertNoContent();
    }
}
