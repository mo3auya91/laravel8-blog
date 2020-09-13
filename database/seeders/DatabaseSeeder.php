<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Post;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(10)->create();

        User::factory()
            ->count(10)
            ->has(Post::factory()
                ->count(3)
                ->afterCreating(function ($post) {
                    $post->categories()->attach(Category::query()->inRandomOrder()->take(3)->pluck('id')->toArray());
                }))
            ->create()
            ->each(function ($user) {
                $team = Team::factory()->count(1)->create(['user_id' => $user->id]);
                $user->update(['current_team_id' => $team->first()->id]);
            });

        CategoryPost::factory(10)->create();
    }
}
