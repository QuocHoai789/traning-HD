<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

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
        $time_limit = Carbon::now()->subHour(1);
        $inactive_users = User::where('last_login', '<', $time_limit)->get();

        $data = [
            'mess' => ' Bạn đã không truy cập hệ thống trong vòng ngày qua',

        ];
        foreach ($inactive_users as $user) {

            Mail::send('frontend.email-send', $data, function ($message) use ($user) {
                $message->from(ENV('MAIL_USERNAME'), 'Demo app');
                $message->to($user->email, 'Đề tài:');
                $message->subject('Tài khoản người dùng demo app');
            });
        }
    }
}
