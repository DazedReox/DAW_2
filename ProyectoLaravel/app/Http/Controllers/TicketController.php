<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketReceipt;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('user_id', Auth::id())->get();
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        $events = Event::all();
        return view('tickets.create', compact('events'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'event_id' => 'required|exists:events,id',
            'type' => 'required|in:presencial,virtual,gratuita',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $ticket = Ticket::create([
            'user_id' => Auth::id(),
            'event_id' => $request->event_id,
            'type' => $request->type,
            'status' => 'confirmed',
        ]);

        Mail::to(Auth::user()->email)->send(new TicketReceipt($ticket));

        return redirect()->route('tickets.index')->with('success', 'Ticket comprado exitosamente.');
    }

    public function show(Ticket $ticket)
    {
        $this->authorize('view', $ticket);
        return view('tickets.show', compact('ticket'));
    }

    public function destroy(Ticket $ticket)
    {
        $this->authorize('delete', $ticket);
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Ticket eliminado exitosamente.');
    }
}
