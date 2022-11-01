<x-layout>

    <div class="bg-gray-200 h-screen pt-16 md:pt-24 md:pb-8">
        <div class="bg-white mx-auto items-center w-4/5 md:flex md:h-144 rounded-lg border shadow-md md:flex-row">
            <img 
                src="{{ asset($event->image) }}" 
                class="object-cover h-full hover:object-scale-down rounded-t-lg md:w-1/2 md:max-w-2xl md:rounded-none md:rounded-l-lg"
                alt="">
            <div class="grid h-full justify-between p-8 leading-normal">
                <div>
                    <h5 class="mb-5 text-2xl uppercase font-bold -tracking-tight text-gray-900">
                    {{ $event->title }}
                    </h5>
                    <span class="text-xs">tags: contpaqi, contabilidad, facturacion</span>
                </div>
                <div class="flex flex-col">
                    <span class="mb-3 text-gray-700">
                        Fecha: 
                        <span @class([
                            'bg-green-200' => $event->date > NOW(),
                            'bg-red-200' => $event->date <= NOW(),
                            'py-1', 
                            'px-2', 
                            'text-xs',
                            'rounded'
                        ])>
                            {{ $event->date->diffForHumans() }}
                        </span>
                    </span>
                    
                    <span class="mb-1">Expositor: {{ $event->subtitle }}</span>
                    <span class="mb-3 font-normal text-gray-700">
                        Descripción: {{ $event->summary }}
                    </span>
                </div>
                <div class="flex flex-col space-y-3 items-center">
                    @if ($event->date > NOW())
                        <a 
                            href="{{ route('guest.events.register', $event) }}" 
                            class="bg-blue-500 text-white text-center rounded p-2 hover:bg-blue-600 active:bg-blue-800 inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mr-2 w-5 h-5">
                                <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                            </svg>
                            Registrarme a este evento
                        </a>
                    @endif
                    <button type="button" class="border text-gray-800 hover:bg-gray-300 rounded py-2 px-4 inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mr-2 w-5 h-5">
                            <path d="M13 4.5a2.5 2.5 0 11.702 1.737L6.97 9.604a2.518 2.518 0 010 .792l6.733 3.367a2.5 2.5 0 11-.671 1.341l-6.733-3.367a2.5 2.5 0 110-3.475l6.733-3.366A2.52 2.52 0 0113 4.5z" />
                        </svg>
                        Compartir a un amigo
                    </button>
                </div>
            </div>
        </div>
    </div>

</x-layout>
