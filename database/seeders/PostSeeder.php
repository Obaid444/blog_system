<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure at least one user exists
     //   $user = User::first() ?? User::factory()->create();

        // Create posts belonging to that user
     //   Post::factory(10)->create([
       //     'user_id' => $user->id,
       // ]);
    }
}
