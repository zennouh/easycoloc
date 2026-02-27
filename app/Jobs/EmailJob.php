<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class EmailJob implements ShouldQueue
{
    use Queueable;

    protected $email;
    protected $url;

    public function __construct($email, $url)
    {
        $this->email = $email;
        $this->url = $url;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $url = $this->url;
        $email = $this->email;
        Mail::raw(
            "You have been invited to join a colocation. Click the link below:\n\n$url",
            function ($message) use ($email) {
                $message->to($email)
                    ->subject('Invitation to join colocation');
            }
        );
    }
}
