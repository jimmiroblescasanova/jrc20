<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\ClientSuscribed;
use App\Notifications\NewSuscriptor;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class SendNewSuscriberNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ClientSuscribed $event)
    {
        $users = User::all();

        Notification::send($users, new NewSuscriptor($event->client));
    }
}
