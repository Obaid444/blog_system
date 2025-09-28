<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;   // (A)
use Illuminate\Mail\Mailables\Envelope;  // (B)
use Illuminate\Queue\SerializesModels;

class PostPublished extends Mailable
{
    use Queueable, SerializesModels;

    public Post $post; // (C)

    /**
     * Create a new message instance.
     */
    public function __construct(Post $post) // (D)
    {
        $this->post = $post; // (E)
    }

    public function envelope(): Envelope // (F)
    {
        return new Envelope(
            subject: 'Your post was published!', // (G)
        );
    }

    public function content(): Content // (H)
    {
        return new Content(
            markdown: 'emails.posts.published', // (I)
            with: [
                'post' => $this->post, // (J)
            ]
        );
    }
}
