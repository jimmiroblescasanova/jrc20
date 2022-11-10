<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Mail\RegistrationSuccess;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SaveRegistrationRequest;

class RegistrationController extends Controller
{

    /**
     * Almacena el registro del evento
     *
     * @param SaveRegistrationRequest $request
     * @param Event $event
     * @return void
     */
    public function store(SaveRegistrationRequest $request, Event $event)
    {

        if (!$registry = $event->registrations()->create($request->validated())) {
           Flasher::addError('Algo salió mal, intenta de nuevo.');
           return back();
        }

        Mail::to($registry)->send(new RegistrationSuccess($event));

        Flasher::addSuccess('Pronto recibirás la confirmación vía email.');

        return redirect()
            ->route('guest.events.show', $event);
    }
}
