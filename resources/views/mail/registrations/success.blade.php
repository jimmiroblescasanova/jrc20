<x-mail::message>
# Registrado con éxito

Por este medio te confirmamos el registro al evento: <b>{{ $event->title }}</b>, esperamos tu asistencia.

La fecha del evento es: {{ $event->date->format('d-m-Y') }}

Recuerda que los eventos inician en punto. 
Te vamos a enviar la ubicación por medio de un mensaje de Whatsapp un día antes. 

<small>Tu asistencia nos ayuda a realizar este tipo de eventos más seguido.</small>

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
