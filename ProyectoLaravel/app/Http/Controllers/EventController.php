<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Speaker;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::paginate(10);
        return view('events.index', compact('events'));
    }

    public function create()
    {
        $speakers = Speaker::all();
        return view('events.create', compact('speakers'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'speaker_id' => 'required|exists:speakers,id'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Evento creado correctamente.');
    }

    public function edit(Event $event)
    {
        $speakers = Speaker::all();
        return view('events.edit', compact('event', 'speakers'));
    }

    public function update(Request $request, Event $event)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'speaker_id' => 'required|exists:speakers,id'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Evento actualizado correctamente.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Evento eliminado correctamente.');
    }
}
