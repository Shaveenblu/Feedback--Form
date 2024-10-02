<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Question;

use App\Models\QuestionCategory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionTest extends TestCase
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
    public function it_gets_questions_list(): void
    {
        $questions = Question::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.questions.index'));

        $response->assertOk()->assertSee($questions[0]->question);
    }

    /**
     * @test
     */
    public function it_stores_the_question(): void
    {
        $data = Question::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.questions.store'), $data);

        $this->assertDatabaseHas('questions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_question(): void
    {
        $question = Question::factory()->create();

        $questionCategory = QuestionCategory::factory()->create();

        $data = [
            'question' => $this->faker->text(255),
            'unique_id' => $this->faker->unique->text(255),
            'question_category_id' => $questionCategory->id,
        ];

        $response = $this->putJson(
            route('api.questions.update', $question),
            $data
        );

        $data['id'] = $question->id;

        $this->assertDatabaseHas('questions', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_question(): void
    {
        $question = Question::factory()->create();

        $response = $this->deleteJson(
            route('api.questions.destroy', $question)
        );

        $this->assertModelMissing($question);

        $response->assertNoContent();
    }
}
