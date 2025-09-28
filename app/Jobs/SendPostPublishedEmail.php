<?php

namespace App\Jobs;

use App\Mail\PostPublished;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;   // (1)
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendPostPublishedEmail implements ShouldQueue // (2)
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels; // (3)

    public Post $post; // (4)

    /**
     * Create a new job instance.
     */
    public function __construct(Post $post) // (5)
    {
        $this->post = $post; // (6)
    }

    /**
     * Execute the job.
     */
    public function handle(): void // (7)
    {
        // send a "fake" email using the log mailer
        Mail::to($this->post->user->email)    // (8)
            ->send(new PostPublished($this->post)); // (9)
    }
}
