<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_see_posts()
    {
        // 1. Make a user
        $user = User::factory()->create();

        // 2. Pretend this user is logged in with Sanctum
        Sanctum::actingAs($user);

        // 3. Make one post in DB
        Post::factory()->create(['title' => 'My First Post']);

        // 4. Call the API
        $response = $this->getJson('/api/posts');

        // 5. Check status and JSON
        $response->assertOk()
                 ->assertJsonFragment(['title' => 'My First Post']);
    }
}
