<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Event;
use App\Models\Client;
use App\Mail\EventCreated;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SaveEventRequest;
use App\Http\Requests\UpdateEventRequest;

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
            ->orderBy('id', 'desc')
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
        $tags = Tag::pluck('name', 'id');
        
        return view('admin.events.create', compact('tags'));
    }

    public function store(SaveEventRequest $request)
    {
        $slug = Str::slug($request->title) . '-' . NOW()->format('his');

        $event = Event::create([
            'title' => $request->title,
            'slug' => $slug,
            'subtitle' => $request->subtitle,
            'summary' => $request->summary,
            'image' => '',
            'date' => $request->date,
        ]);

        // Agregar la imagen y asociar el modelo
        if ($request->has('image')) {
            $event->addMediaFromRequest('image')->toMediaCollection('events');
        }

        // se agregan las etiquetas a la relacion 
        $event->tags()->sync($request->tags);

        // lógica para enviar el email al queue 
        $clients = Client::query()
            ->where('unsuscribe_at', null)
            ->get();

        foreach ($clients as $recipient) {
            Mail::to($recipient->email)->queue(new EventCreated($event));
        }

        flash()->addSuccess('Evento creado con éxito');
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
        $tags = Tag::pluck('name', 'id');

        // return $event->tags->pluck('id');

        return view('admin.events.show', [
            'event' => $event,
            'tags' => $tags,
        ]);
    }

    /**
     * Actualiza el modelo del event
     *
     * @param Event $event
     * @param UpdateEventRequest $request
     * @return void
     */
    public function update(Event $event, UpdateEventRequest $request)
    {
        $event->update($request->safe()->except('image'));

        // Agregar la imagen y asociar el modelo
        if ($request->has('image')) {
            $event->addMediaFromRequest('image')->toMediaCollection('events');
        }

        // se agregan las etiquetas a la relacion 
        $event->tags()->sync($request->tags);

        flash()->addSuccess('Evento actualizado con éxito');
        return redirect()->route('admin.events.index');
    }

    public function delete(Event $event)
    {
        if($event->registrations()->exists())
        {
            flash()->addWarning('No se puede eliminar si tiene clientes registrados');
            return back();
        }

        $event->delete();
        flash()->addSuccess('Evento eliminado con éxito');
        return redirect()->route('admin.events.index');
    }
}
