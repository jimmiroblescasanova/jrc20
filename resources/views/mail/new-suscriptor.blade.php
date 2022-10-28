<x-mail::message>
# Hola {{ $name }},

<x-mail::panel>Tu suscripcion ha sido registrada correctamente.</x-mail::panel>

Saludos,<br>
{{ config('app.name') }}

<span style="font-size: 10px;">Asegurate de agregar el correo a los remitentes de confianza para que puedas recibir futuras alertas.</span>
</x-mail::message>
