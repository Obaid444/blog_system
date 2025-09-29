<?php

namespace App\Mail;                                      // (1)

use App\Models\Post;                                    // (2)
use Illuminate\Bus\Queueable;                           // (3)
use Illuminate\Contracts\Queue\ShouldQueue;             // (4)
use Illuminate\Mail\Mailable;                           // (5)
use Illuminate\Queue\SerializesModels;                  // (6)

class PostPublishedMail extends Mailable implements ShouldQueue // (7)
{
    use Queueable, SerializesModels;                    // (8)

    public Post $post;                                  // (9)

    public function __construct(Post $post)             // (10)
    {
        $this->post = $post;                            // (11)
    }

    public function build(): self                       // (12)
    {
        return $this->subject('New Post: ' . $this->post->title) // (13)
                    ->markdown('emails.posts.published', [       // (14)
                        'post' => $this->post                     // (15)
                    ]);
    }
}
