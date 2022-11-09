<x-app-layout>
    <x-slot name="header">
        <div class="w-full inline-flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Evento: {{ $event->title }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 lg:grid lg:grid-cols-3">
        <div class="mx-auto px-5 lg:px-8 mb-4 w-full">
            <div class="bg-gray-500 text-white font-bold py-3 px-4 rounded-t-lg">
                Información del evento y participantes
            </div>
            <div class="bg-white shadow p-4 rounded-b-lg">
                <form action="{{ route('admin.events.update', $event) }}" method="post" enctype="multipart/form-data">
                    @csrf 
                    @method('patch')
                    <x-input-icon name="title" :value="$event->title" label="Ingresa el titulo del evento">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-gray-500 w-5 h-5">
                        <path fill-rule="evenodd" d="M1 2.75A.75.75 0 011.75 2h10.5a.75.75 0 010 1.5H12v13.75a.75.75 0 01-.75.75h-1.5a.75.75 0 01-.75-.75v-2.5a.75.75 0 00-.75-.75h-2.5a.75.75 0 00-.75.75v2.5a.75.75 0 01-.75.75h-2.5a.75.75 0 010-1.5H2v-13h-.25A.75.75 0 011 2.75zM4 5.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5v1a.5.5 0 01-.5.5h-1a.5.5 0 01-.5-.5v-1zM4.5 9a.5.5 0 00-.5.5v1a.5.5 0 00.5.5h1a.5.5 0 00.5-.5v-1a.5.5 0 00-.5-.5h-1zM8 5.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5v1a.5.5 0 01-.5.5h-1a.5.5 0 01-.5-.5v-1zM8.5 9a.5.5 0 00-.5.5v1a.5.5 0 00.5.5h1a.5.5 0 00.5-.5v-1a.5.5 0 00-.5-.5h-1zM14.25 6a.75.75 0 00-.75.75V17a1 1 0 001 1h3.75a.75.75 0 000-1.5H18v-9h.25a.75.75 0 000-1.5h-4zm.5 3.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5v1a.5.5 0 01-.5.5h-1a.5.5 0 01-.5-.5v-1zm.5 3.5a.5.5 0 00-.5.5v1a.5.5 0 00.5.5h1a.5.5 0 00.5-.5v-1a.5.5 0 00-.5-.5h-1z" clip-rule="evenodd" />
                        </svg>
                    </x-input-icon>
                    <x-input-icon name="subtitle" label="Ingresa el subtitulo o expositor" :value="$event->subtitle">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-gray-500 w-5 h-5">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5-2.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM10 12a5.99 5.99 0 00-4.793 2.39A6.483 6.483 0 0010 16.5a6.483 6.483 0 004.793-2.11A5.99 5.99 0 0010 12z" clip-rule="evenodd" />
                        </svg>
                    </x-input-icon>
                    <x-input-icon type="datetime-local" name="date" label="Fecha del evento" :value="$event->date">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-gray-500 w-5 h-5">
                        <path d="M5.25 12a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H6a.75.75 0 01-.75-.75V12zM6 13.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V14a.75.75 0 00-.75-.75H6zM7.25 12a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H8a.75.75 0 01-.75-.75V12zM8 13.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V14a.75.75 0 00-.75-.75H8zM9.25 10a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H10a.75.75 0 01-.75-.75V10zM10 11.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V12a.75.75 0 00-.75-.75H10zM9.25 14a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H10a.75.75 0 01-.75-.75V14zM12 9.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V10a.75.75 0 00-.75-.75H12zM11.25 12a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H12a.75.75 0 01-.75-.75V12zM12 13.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V14a.75.75 0 00-.75-.75H12zM13.25 10a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H14a.75.75 0 01-.75-.75V10zM14 11.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V12a.75.75 0 00-.75-.75H14z" />
                        <path fill-rule="evenodd" d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z" clip-rule="evenodd" />
                        </svg>
                    </x-input-icon>
                    <div id="group-description" class="mb-5">
                        <label 
                            for="summary" 
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                            Descripción completa del evento
                        </label>
                        <textarea 
                            id="summary" 
                            name="summary"
                            rows="5" 
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Temario, contenido, información, etc..."
                            >{{ $event->summary }}</textarea>
                    </div>
                    <div class="mb-4"><a href="{{ asset('storage/'.$event->image) }}" target="_blank" class="hover:underline">Ver imagen en otra ventana</a></div>
                    <div id="group-file" class="mb-3">
                        <input type="file" name="image" id="image">
                    </div>
                    <div>
                        <button 
                            type="submit" 
                            class="p-2 text-white rounded bg-cyan-600 transition-colors hover:bg-cyan-900">
                            Actualizar evento
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="mx-auto px-5 lg:px-8 col-span-2 w-full">
            <div class="bg-white overflow-x-auto shadow-sm rounded-lg">
                <x-table>
                    <x-slot:headings>
                        <x-table.heading>Nombre completo</x-table.heading>
                        <x-table.heading>Email</x-table.heading>
                        <x-table.heading>Teléfono</x-table.heading>
                        <x-table.heading>Empresa</x-table.heading>
                        <x-table.heading>Fecha</x-table.heading>
                    </x-slot:headings>

                    @forelse ($event->registrations as $registration)
                        <tr>
                            <x-table.row>{{ $registration->name }}</x-table.row>
                            <x-table.row>{{ $registration->email }}</x-table.row>
                            <x-table.row>{{ $registration->phone }}</x-table.row>
                            <x-table.row>{{ $registration->company }}</x-table.row>
                            <x-table.row>{{ $registration->created_at->diffForHumans() }}</x-table.row>
                        </tr>  
                    @empty
                        <tr>
                            <td colspan="5" class="py-2 px-4">No existe ningún registro</td>
                        </tr>
                    @endforelse
                </x-table>
            </div>
        </div>
    </div>
</x-app-layout>