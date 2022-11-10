<x-mail::message>
# Registrado con éxito

<img src="{{ asset('images/registered.svg') }}" alt="invitation sent" width="135" style="display: block; margin: 0 auto; padding: 15px 0;">

Por este medio te confirmamos el registro al evento: <b>{{ $event->title }}</b>.

La fecha del evento es: {{ $event->date->format('d-m-Y') }}, hora: {{ $event->date->format('g:i A') }} (hora del centro de México). 
Recuerda que todos los eventos inician en punto. 

Evento presencial: Te vamos a enviar la ubicación por medio de un mensaje de Whatsapp un día antes. 

Sesión en lína: La liga de acceso se te envíará por medio del correo electrónico registrado. 

<small>Tu asistencia nos ayuda a realizar este tipo de eventos más seguido.</small>

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
