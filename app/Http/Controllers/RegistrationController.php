<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\SaveRegistrationRequest;

class RegistrationController extends Controller
{

    public function store(SaveRegistrationRequest $request, Event $event)
    {

        $registry = $event->registrations()->create($request->validated());

        return redirect()
            ->route('guest.events.index');
    }
}
