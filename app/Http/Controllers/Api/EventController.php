<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Jobs\CheckTimeOutEdit;

class EventController extends Controller
{
    public function editable($id)
    {
        $userId = Auth::user()->id;
        DB::beginTransaction();
        $event = Event::lockForUpdate()->findOrFail($id);
        try {
            if ($event->user_edit != NULL && $event->user_edit != $userId) {
                DB::rollBack();
                return response()->json('Cant access to edit', 409);
            }
            $event->user_edit = $userId;
            $event->time_edit = Carbon::now();
            $event->save();
            DB::commit();
            return response()->json(['event', $event], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json('Cant access to edit', 409);
        }
    }
    public function release($id)
    {

        $userId = Auth::user()->id;
        DB::beginTransaction();
        $event = Event::lockForUpdate()->findOrFail($id);
        try {

            if ($event->user_edit != NULL && $event->user_edit == $userId) {
                $event->user_edit = NULL;
                $event->time_edit = NULL;
                $event->save();
                DB::commit();
                return response()->json(['event', $event], 200);
            } else {
                DB::rollBack();
                return response()->json(['error' => 'Cannot release'], 400);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Cannot release'], 400);
        }
    }
    public function maintain($id)
    {
        $userId = Auth::user()->id;
        DB::beginTransaction();
        $event = Event::lockForUpdate()->findOrFail($id);
        try {
            if ($event->user_edit != NULL && $event->user_edit == $userId) {
                $event->time_edit = Carbon::now();
                $event->save();
                DB::commit();
                return response()->json(['event' => $event], 200);
            } else {
                DB::rollBack();
                return response()->json(['error' => 'Cannot maintain'], 400);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Cannot maintain'], 400);
        }
    }
}
