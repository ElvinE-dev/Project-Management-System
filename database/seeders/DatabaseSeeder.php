<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Project::factory(10)->create();

        $users = User::all();

        Project::all()->each(function ($project) use ($users) {
            $project->members()->attach(
                $users->random(rand(3, 6))->pluck('id')
            );
        });
    }
}
