<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CustomerFormUrl;

class CustomerFormUrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomerFormUrl::factory()
            ->count(5)
            ->create();
    }
}
