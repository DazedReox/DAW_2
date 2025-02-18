<?php

namespace App\Repositories;

use App\Models\Event;

class EventRepository
{
    public function getAllEvents()
    {
        return Event::all();
    }

    public function getEventById($id)
    {
        return Event::findOrFail($id);
    }

    public function createEvent(array $data)
    {
        return Event::create($data);
    }

    public function updateEvent($id, array $data)
    {
        $event = Event::findOrFail($id);
        $event->update($data);
        return $event;
    }

    public function deleteEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
    }
}
