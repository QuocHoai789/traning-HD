<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Event;

class CheckTimeEditEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:time';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check time edit events';

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
        $timeLimit = Carbon::now()->subMinutes(2);
        $eventIsEditings = Event::whereNotNull('time_edit')
            ->where('time_edit', '<', $timeLimit)
            ->pluck('id');
        Event::whereIn('id', $eventIsEditings)
            ->update(['user_edit' => null, 'time_edit' => null]);
    }
}
