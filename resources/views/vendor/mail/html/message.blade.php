<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="config('app.url')">
{{ config('app.name') }}
</x-mail::header>
</x-slot:header>

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
<x-slot:subcopy>
<x-mail::subcopy>
{{ $subcopy }}
</x-mail::subcopy>
</x-slot:subcopy>
@endisset

{{-- Footer --}}
<x-slot:footer>
<x-mail::footer>
© {{ date('Y') }} {{ config('app.name') }}. @lang('Todos los derechos reservados.')
<br/>
Este es un mensaje auto-generado, por favor responder a la cuenta personal. Si deseas darte de baja de las suscripciones, puedes enviar un correo a: direccion@jrctecnologia.mx, con el asunto "Baja".
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>
