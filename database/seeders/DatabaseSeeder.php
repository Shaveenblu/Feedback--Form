<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);

        $this->call(CustomerSeeder::class);
        $this->call(GuideSeeder::class);
        $this->call(HotelSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(QuestionCategorySeeder::class);
        $this->call(ResponseTypeSeeder::class);
        $this->call(TourSeeder::class);
        $this->call(UserSeeder::class);
    }
}
