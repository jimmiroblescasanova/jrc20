<x-mail::message>
# Nuevo evento disponible

<img src="{{ asset('images/newsletter.svg') }}" alt="event created" width="135" style="display: block; margin: 0 auto; padding: 15px 0;">

Hola! Nos complace informarte que ya te puedes registrar en nuestro nuevo evento disponible: <b>{{ $event->title }}</b> 

Recuerda que todos nuestros eventos son totalmente <span style="text-decoration: underline;">SIN COSTO</span> y puedes invitar a quien tu quieras. 

<x-mail::button :url="route('guest.events.show', $event)">
Más información
</x-mail::button>

Te esperamos!,<br>
{{ config('app.name') }}
</x-mail::message>
