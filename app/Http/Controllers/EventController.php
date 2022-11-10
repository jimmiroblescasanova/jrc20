<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Client;
use App\Mail\ShareEvent;
use Illuminate\Http\Request;
use App\Events\ClientSuscribed;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\NewClientRequest;

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
     * Agrega el cliente a las suscripciones
     *
     * @param NewClientRequest $request
     * @return void
     */
    public function suscription(NewClientRequest $request)
    {
        $client = Client::create($request->validated());

        ClientSuscribed::dispatch($client);

        return back()->with('suscribed', $client->name);
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
