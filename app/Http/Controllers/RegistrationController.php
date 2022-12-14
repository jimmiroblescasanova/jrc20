<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Mail\EventReminderEmail;
use App\Mail\RegistrationSuccess;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SaveRegistrationRequest;

class RegistrationController extends Controller
{

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

    /**
     * Almacena el registro del evento
     *
     * @param SaveRegistrationRequest $request
     * @param Event $event
     * @return void
     */
    public function store(SaveRegistrationRequest $request, Event $event)
    {
        // check if email already registered
        if($event->registrations->contains('email', $request->email))
        {
            flash()->addWarning('Ops! Ese correo ya esta registrado.');
            
            return back()->withInput($request->input());
        }

        // create the registration and throw an error if fails
        if (!$registry = $event->registrations()->create($request->validated())) {
           Flasher::addError('Algo salió mal, intenta de nuevo.');
           return back();
        }

        // Envía el correo del registro al evento
        Mail::to($registry)->send(new RegistrationSuccess($event));

        // Programa el recordatorio del evento
        Mail::to($registry)->later($event->date->subDays(1), new EventReminderEmail($event));

        Flasher::addSuccess('Pronto recibirás la confirmación vía email.');

        return redirect()
            ->route('guest.events.show', $event);
    }
}
