<?php

namespace Database\Seeders;

use App\Models\ResponseType;
use Illuminate\Database\Seeder;

class ResponseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ResponseType::factory()
            ->count(5)
            ->create();
    }
}
