<x-mail::message>
# {{ $event->title }}

Hola, estas recibiendo este correo porque: {{ $sender }}, te ha invitado.

Esperamos este evento sea de tu agrado y puedas asistir, si quieres mas información o si deseas registrarte, 
puedes hacer click en el botón de abajo.

<x-mail::button :url="route('guest.events.show', $event)">
Más información
</x-mail::button>

Saludos,<br>
{{ config('app.name') }}
</x-mail::message>
