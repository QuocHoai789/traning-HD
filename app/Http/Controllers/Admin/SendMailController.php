<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Jobs\SendMail;
use Carbon\Carbon;
use App\Models\OutgoingEmail;

class SendMailController extends Controller
{
    public function sendMailQueue()
    {
        $timeLimit = Carbon::now()->subHour(1);
        $inactiveUsers = User::where('last_login', '<', $timeLimit)->get();
        foreach ($inactiveUsers as $user) {

            OutgoingEmail::firstOrCreate(['email' => $user->email]);
        }
        $userMails = OutgoingEmail::where('status', 'PENDING')->get();
        $data = [
            'subject' => 'Message from demo_app to inactive user.',
            'message' => 'You are not login for oneday. Please login '
        ];
        $job = new SendMail($data, $userMails);
        dispatch($job)->delay(Carbon::now()->addMinutes(1));

        foreach ($userMails as $mail) {
            OutgoingEmail::where('id', $mail->id)
                ->update(['status' => 'SENDING']);
        }
        return "Done. Send mail to inactive user is successfully!";
    }
}
