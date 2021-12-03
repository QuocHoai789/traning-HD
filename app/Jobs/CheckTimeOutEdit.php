<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class CheckTimeOutEdit implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    //public $event;
    public function __construct()
    {
        //$this->event = $event;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // if ( $this->event->updated_at < Carbon::now()->subMinutes(5)) {
        //     $this->event->user_edit = null;
        //     $this->event->save();
        // }

        // return response()->json(['event' => $this->event], 200);
        $data = [
            'mess' => ' You are not login system in today',

        ];
        Mail::send('frontend.email-send-daily', $data, function ($message) {
            $message->from(ENV('MAIL_USERNAME'), 'Demo app');
            $message->to('nguyenquochoai789@gmail.com', 'Subject:');
            $message->subject('User account test job');
        });
    }
}
