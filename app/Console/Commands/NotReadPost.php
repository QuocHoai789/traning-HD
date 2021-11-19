<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin;
class NotReadPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:notread';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Find post that not read in every day';

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
        $time_view_limit = Carbon::now()->subDay(1); 
        $not_read_posts = Post::where('last_view','<', $time_view_limit)->orWhere('last_view', null)->get();
        $admin = Admin::where('level', 1)->first();
        if(count($not_read_posts)){
            $not_read_arr = [];
            foreach($not_read_posts as $post){
                $not_read_arr[] = $post->id;
            }
            Mail::send('frontend.email-send-not-read-post',['not_read_arr'=> $not_read_arr] , function ($message) use ($admin) {
                $message->from(ENV('MAIL_USERNAME'), 'Demo app');
                $message->to($admin->email, 'Bài viết:' );
                $message->subject('Danh sách bài viết chưa được đọc trong ngày');
            });
            
        }
        
    }
}
