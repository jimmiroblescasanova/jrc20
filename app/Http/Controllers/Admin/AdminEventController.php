<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Client;
use Illuminate\Support\Str;
use App\Models\Registration;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SaveEventRequest;
use App\Mail\EventCreated;

class AdminEventController extends Controller
{
    /**
     * Enlista los eventos creados
     *
     * @return void
     */
    public function index()
    {
        $events = Event::query()
            ->orderBy('date', 'desc')
            ->paginate();

        return view('admin.events.index', [
            'events' => $events,
        ]);
    }

    /**
     * Vista para la creación del modelo
     *
     * @return void
     */
    public function create()
    {
        return view('admin.events.create');
    }

    public function store(SaveEventRequest $request)
    {
        $path = $request->file('image')->store('events');
        $slug = Str::slug($request->title);

        $event = Event::create([
            'title' => $request->title,
            'slug' => $slug,
            'subtitle' => $request->subtitle,
            'summary' => $request->summary,
            'image' => $path,
            'date' => $request->date,
        ]);

        // lógica para enviar el email al queue 
        $clients = Client::all();

        foreach ($clients as $recipient) {
            Mail::to($recipient->email)->queue(new EventCreated($event));
        }

        return redirect()->route('admin.events.index');
    }

    /**
     * Muestra el modelo del evento seleccionado
     *
     * @param Event $event
     * @return void
     */
    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }
}
