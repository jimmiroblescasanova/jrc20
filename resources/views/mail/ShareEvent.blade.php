<x-mail::message>
# {{ $event->title }}

<img src="{{ asset('images/invitation.svg') }}" alt="invitation sent" width="135" style="display: block; margin: 0 auto; padding: 15px 0;">

Hola, estas recibiendo este correo porque: {{ $sender }}, te ha invitado.

Esperamos este evento sea de tu agrado y puedas asistir, si quieres mas información o si deseas registrarte, 
puedes hacer click en el botón de abajo.

<x-mail::button :url="route('guest.events.show', $event)">
Más información
</x-mail::button>

Saludos,<br>
{{ config('app.name') }}
</x-mail::message>
