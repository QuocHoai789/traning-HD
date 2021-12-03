<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function listEvent()
    {
        
        $events = Event::all();
        return view('frontend.event.list', compact('events'));
    }
    public function editEvent($id)
    {
        $timeLimit = Carbon::now()->subMinutes(5);
        $userId = Auth::user()->id;
        DB::beginTransaction();
        $event = Event::lockForUpdate()->findOrFail($id);
        try {
            if ($event->user_edit != null  && $event->user_edit != $userId ) {
                DB::rollBack();
                return redirect()->back();
            }
            $event->user_edit = $userId;
            $event->time_edit = Carbon::now();
            $event->save();
            DB::commit();
            return view('frontend.event.edit', compact('event'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }
    }
    public function saveEvent(Request $req, $id)
    {
        //dd($req->all());
        $event = Event::find($id);
        $req->validate(['name' => 'required', 'content' => 'required']);
        $name = $req->name;
        $content = $req->content;
        $event->update(['name' => $name, 'content' => $content, 'user_edit' => null, 'time_edit' => null]);
        return redirect(route('event.list'));
    }
}
