<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = User::pluck('id')->toArray();

        if (empty($userIds)) {
            return;
        }

        Post::factory()
            ->count(20)
            ->make()
            ->each(function (Post $post) use ($userIds) {
                $post->user_id = fake()->randomElement($userIds);
                $post->save();
            });
    }
}
