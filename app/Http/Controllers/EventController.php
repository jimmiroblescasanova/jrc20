<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('events.index', [
            'events' => Event::all(),
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

    public function saveRegistry(Request $request)
    {
        return $request;
    }
}
