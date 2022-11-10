<x-mail::message>
# {{ $client->name }}

<img src="{{ asset('images/mail_sent.svg') }}" alt="mail sent" width="135" style="display: block; margin: 0 auto; padding: 15px 0;">

Te has registrado con éxito a nuestro boletín.

Cuando haya algún evento nuevo se te enviará una notificación por este medio.
Recuerda guardar el dominio @jrctecnologia.mx, a los correos de confianza para evitar que llegue a tu bandeja de SPAM.


Saludos,<br>
{{ config('app.name') }}
</x-mail::message>
