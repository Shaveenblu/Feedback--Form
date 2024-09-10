<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\QuestionCategory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionCategoryControllerTest extends TestCase
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
    public function it_displays_index_view_with_question_categories(): void
    {
        $questionCategories = QuestionCategory::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('question-categories.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.question_categories.index')
            ->assertViewHas('questionCategories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_question_category(): void
    {
        $response = $this->get(route('question-categories.create'));

        $response->assertOk()->assertViewIs('app.question_categories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_question_category(): void
    {
        $data = QuestionCategory::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('question-categories.store'), $data);

        $this->assertDatabaseHas('question_categories', $data);

        $questionCategory = QuestionCategory::latest('id')->first();

        $response->assertRedirect(
            route('question-categories.edit', $questionCategory)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_question_category(): void
    {
        $questionCategory = QuestionCategory::factory()->create();

        $response = $this->get(
            route('question-categories.show', $questionCategory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.question_categories.show')
            ->assertViewHas('questionCategory');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_question_category(): void
    {
        $questionCategory = QuestionCategory::factory()->create();

        $response = $this->get(
            route('question-categories.edit', $questionCategory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.question_categories.edit')
            ->assertViewHas('questionCategory');
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

        $response = $this->put(
            route('question-categories.update', $questionCategory),
            $data
        );

        $data['id'] = $questionCategory->id;

        $this->assertDatabaseHas('question_categories', $data);

        $response->assertRedirect(
            route('question-categories.edit', $questionCategory)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_question_category(): void
    {
        $questionCategory = QuestionCategory::factory()->create();

        $response = $this->delete(
            route('question-categories.destroy', $questionCategory)
        );

        $response->assertRedirect(route('question-categories.index'));

        $this->assertModelMissing($questionCategory);
    }
}
