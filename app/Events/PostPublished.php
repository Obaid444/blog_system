<?php
namespace App\Events;
use App\Models\Post;                         // (2)
use Illuminate\Broadcasting\InteractsWithSockets; // (3)
use Illuminate\Foundation\Events\Dispatchable;    // (4)
use Illuminate\Queue\SerializesModels;      // (5)

class PostPublished
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Post $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}