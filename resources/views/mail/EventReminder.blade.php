<x-mail::message>
# No te olvides!

<img src="{{ asset('images/conference.svg') }}" alt="event created" width="135" style="display: block; margin: 0 auto; padding: 15px 0;">

Mañana es el día de: {{ $event->title }}

Hora: {{ $event->date->format('g:i A') }} (tiempo del centro).

Te esperamos,<br>
{{ config('app.name') }}
</x-mail::message>
