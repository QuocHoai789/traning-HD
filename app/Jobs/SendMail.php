<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Carbon\Carbon;
use App\Mail\SendMailInactive;
use App\Models\OutgoingEmail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $data, $userMails;
    public function __construct($data, $userMails)
    {
        $this->data = $data;
        $this->userMails = $userMails;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        foreach ($this->userMails as $mail) {

            try {
                Mail::to($mail->email)
                    ->send(new SendMailInactive($this->data));
                OutgoingEmail::where('id', $mail->id)
                    ->update(['status' => 'DONE']);
            } catch (\Exception $e) {
                OutgoingEmail::where('id', $mail->id)
                    ->update(['status' => 'ERROR']);
            }
        }
    }
}
