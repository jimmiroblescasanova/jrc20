<?php

namespace App\Http\Controllers;

use App\Mail\ShareEvent;
use App\Models\Event;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::query()
            ->orderBy('date', 'desc')
            ->paginate();

        return view('events.index', [
            'events' => $event,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('events.show', [
            'event' => $event,
        ]);
    }

    /**
     * Devuelve la vista del registro
     *
     * @param Event $event
     * @return \Illuminate\Http\Response
     */
    public function register(Event $event)
    {
        return view('events.register', compact('event'));
    }

    public function invite(Event $event, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:5',
            'email' =>'required|email',
        ]);

        Mail::to($validated['email'])->send(new ShareEvent($event, $validated['name']));

        Flasher::addSuccess('La invitación ha sido enviada.');
        return back();
    }
}
