<?php

namespace Database\Seeders;

use App\Models\FeedBackForm;
use Illuminate\Database\Seeder;

class FeedBackFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FeedBackForm::factory()
            ->count(5)
            ->create();
    }
}
