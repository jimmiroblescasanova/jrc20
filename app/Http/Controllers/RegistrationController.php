<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Flasher\Laravel\Facade\Flasher;
use App\Http\Requests\SaveRegistrationRequest;

class RegistrationController extends Controller
{

    public function store(SaveRegistrationRequest $request, Event $event)
    {

        if (!$registry = $event->registrations()->create($request->validated())) {
           Flasher::addError('Algo salió mal, intenta de nuevo');
           return back();
        }

        Flasher::addSuccess('Hemos enviado la confirmación del registro a tu correo: ' . $registry->email);

        return redirect()
            ->route('guest.events.show', $event);
    }
}
