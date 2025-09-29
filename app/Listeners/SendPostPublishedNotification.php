<?php

namespace App\Listeners;                                  // (1)

use App\Events\PostPublished;                            // (2)
use App\Mail\PostPublishedMail;                          // (3)
use Illuminate\Contracts\Queue\ShouldQueue;              // (4)
use Illuminate\Queue\InteractsWithQueue;                 // (5)
use Illuminate\Support\Facades\Mail;       

class SendPostPublishedNotification implements ShouldQueue{



    use InteractsWithQueue;

    public function handle(PostPublished $event):void 
    {
        $post = $event->post;
        $recipient = $post->user->email ?? 'text@example.come';
        Mail::to($recipient)->send(new PostPublishedMail($post));
    }
}