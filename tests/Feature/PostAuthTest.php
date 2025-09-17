<?php

use App\Models\User;
use App\Models\Post;

test('guest cannot access create post page', function () {
    $response = $this->get('/posts/create');
    $response->assertRedirect('/login'); // guests go to login
});

test('logged-in user can access create post page', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/posts/create');

    $response->assertStatus(200); // success
});
