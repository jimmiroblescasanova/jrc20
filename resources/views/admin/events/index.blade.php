<x-app-layout>
    <x-slot name="header">
        <div class="w-full inline-flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lista de Eventos
            </h2>
            <a href="{{ route('admin.events.create') }}"
                class="px-3 py-1 text-sm text-white bg-indigo-500 hover:bg-indigo-800 rounded transition-colors">
                Nuevo evento</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg">

                <x-table>
                    <x-slot:headings>
                        <x-table.heading>ID</x-table.heading>
                        <x-table.heading>Titulo</x-table.heading>
                        <x-table.heading>Fecha</x-table.heading>
                        <x-table.heading>Registrados</x-table.heading>
                        <x-table.heading>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </x-table.heading>
                    </x-slot:headings>

                    @forelse ($events as $event)
                        <tr class="border-b">
                            <x-table.row>{{ $event->id }}</x-table.row>
                            <x-table.row>{{ $event->title }}</x-table.row>
                            <x-table.row>{{ $event->date }}</x-table.row>
                            <x-table.row>{{ $event->registrations()->count() }}</x-table.row>
                            <x-table.row>
                                <a href="{{ route('admin.events.show', $event) }}" class="text-white text-sm py-1 px-3 transition-colors rounded bg-indigo-400 hover:bg-indigo-700 inline-flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-2">
                                    <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                    <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                                    </svg>
                                    Ver
                                </a>
                            </x-table.row>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-2 px-2">No existen registros para el filtro seleccionado.</td>
                        </tr>
                    @endforelse
                </x-table>

                <div class="py-2 px-4">
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
