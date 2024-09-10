<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Question;
use App\Models\QuestionCategory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionCategoryQuestionsTest extends TestCase
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
    public function it_gets_question_category_questions(): void
    {
        $questionCategory = QuestionCategory::factory()->create();
        $questions = Question::factory()
            ->count(2)
            ->create([
                'question_category_id' => $questionCategory->id,
            ]);

        $response = $this->getJson(
            route('api.question-categories.questions.index', $questionCategory)
        );

        $response->assertOk()->assertSee($questions[0]->question);
    }

    /**
     * @test
     */
    public function it_stores_the_question_category_questions(): void
    {
        $questionCategory = QuestionCategory::factory()->create();
        $data = Question::factory()
            ->make([
                'question_category_id' => $questionCategory->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.question-categories.questions.store', $questionCategory),
            $data
        );

        $this->assertDatabaseHas('questions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $question = Question::latest('id')->first();

        $this->assertEquals(
            $questionCategory->id,
            $question->question_category_id
        );
    }
}
