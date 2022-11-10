<x-mail::message>
# Clientes registrados a eventos:

<x-mail::table>
| Nombre    | Evento    |
| :-------- | :------- |
@foreach ($suscribers as $suscriptor)
    | {{ $suscriptor->name }} | {{ $suscriptor->event->title }} |
@endforeach
</x-mail::table>

Saludos,<br>
{{ config('app.name') }}
</x-mail::message>
