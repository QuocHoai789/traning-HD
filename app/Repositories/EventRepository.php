<?php

namespace App\Repositories;

use App\Models\Event;

class EventRepository implements EventRepositoryInterface
{
    public function find($id)
    {
        return Event::find($id);
    }
    public function all()
    {
        return Event::all();
    }
    public  function update($id, array $data)
    {
        $event = Event::find($id);
        $event->update($data);
        return $event;
    }
    public function create(array $data)
    {
        return Event::create($data);
    }
    public function delete($id)
    {
        return Event::find($id)->delete();
    }
}
