<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\OutgoingEmail;
use App\Jobs\SendMail;


class InactiveUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:inactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check user who are not active for 1 day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //return Command::SUCCESS;
        //$time_limit = Carbon::now()->subHour(1);
        //$inactiveUsers = User::where('last_login', '<' ,Carbon::now()->subHour(1))->get();
        // foreach($inactiveUsers as $user){
        //     OutgoingEmail::firstOrCreate(['email' => $user->email]);
        // }
         $mailUsers = OutgoingEmail::where('status', 'PENDING')->get();

        $data = [
            'mess' => ' You are not login system in today',

        ];
        $userIds = $mailUsers->pluck('id');
        OutgoingEmail::whereIn('id', $userIds)
            ->update(['status' => 'SENDING']);
        foreach ($mailUsers as $userMails) {
            $job = new SendMail($data, $userMails);
            dispatch($job)->onQueue('sendmailInactive')->delay(Carbon::now()->addMinutes(1));
           

            // Mail::send('frontend.email-send-daily', $data, function ($message) use ($user) {
            //     $message->from(ENV('MAIL_USERNAME'), 'Demo app');
            //     $message->to($user->email, 'Subject:');
            //     $message->subject('User account');
            // });
        }
    }
}
