<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sendmail;

class SendEmailJob implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    protected $event;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($event) {
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->subject('Mail from ItSolutionStuff.com')->view('mail.forgot');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        $event = $this->event;
        Mail::send('mail.' . $this->event['_blade'], $event, function ($message) use ($event) {
            $message->to($event['toemail'], env('APP_NAME'));
            $message->subject('Forgot Password');
        });
    }

}
