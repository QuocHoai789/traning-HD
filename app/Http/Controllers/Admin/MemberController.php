<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\OutgoingEmail;
use App\Jobs\SendMail;

class MemberController extends Controller
{
    public function listIncativeUser()
    {
        $inactiveUsers = OutgoingEmail::all();
        return view('admin.member.list-inactive', compact('inactiveUsers'));
    }
    public function sendMailQueue()
    {

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
        return redirect()->back()->with(["nofitication" => "Done. Send mail to inactive user is successfully!"]);;
    }
}
