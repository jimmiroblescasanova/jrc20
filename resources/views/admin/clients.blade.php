<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Clientes registrados
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg">

                <x-table>
                    <x-slot:headings>
                        <x-table.heading>Apellidos</x-table.heading>
                        <x-table.heading>Nombre (s)</x-table.heading>
                        <x-table.heading>Email</x-table.heading>
                        <x-table.heading>Empresa</x-table.heading>
                        <x-table.heading>Alta / Baja</x-table.heading>
                        <x-table.heading>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </x-table.heading>
                    </x-slot:headings>

                    @forelse ($clients as $client)
                        <tr class="border-b">
                            <x-table.row>{{ $client->lastname }}</x-table.row>
                            <x-table.row>{{ $client->name }}</x-table.row>
                            <x-table.row>{{ $client->email }}</x-table.row>
                            <x-table.row>{{ $client->company }}</x-table.row>
                            <x-table.row>
                                @if (is_null($client->unsuscribe_at))
                                    <span class="bg-blue-200 text-blue-800 text-xs rounded-full px-2 py-1">{{ $client->created_at->diffForHumans() }}</span>
                                @else
                                    <span class="bg-red-200 text-red-800 text-xs rounded-full px-2 py-1">{{ $client->unsuscribe_at->diffForHumans() }}</span>
                                @endif
                            </x-table.row>
                            <x-table.row>
                                @if (is_null($client->unsuscribe_at))
                                    <form action="{{ route('admin.clients.unsuscribe', $client) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="text-xs bg-red-500 text-white font-bold px-2 py-1 rounded-full hover:bg-red-700 active:bg-red-900">
                                            Cancelar suscripcion
                                        </button>
                                    </form>
                                @endif
                            </x-table.row>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-2 px-2">No existen registros para el filtro seleccionado.</td>
                        </tr>
                    @endforelse
                </x-table>

                <div class="py-2 px-4">
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
