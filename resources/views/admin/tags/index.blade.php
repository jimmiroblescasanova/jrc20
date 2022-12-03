<x-app-layout>
    <x-slot name="header">
        <div class="w-full inline-flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lista de Etiquetas
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:pb-3">
            <div class="bg-white shadow-sm rounded-sm sm:rounded-lg p-3">
                <form action="{{ route('admin.tags.store') }}" method="POST" class="flex flex-row">
                    @csrf
                    <div class="grow">
                        <x-input-icon name="name" label="Etiqueta:" placeholder="Nombre de la etiqueta">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                            </svg>
                        </x-input-icon>
                        <x-input-error-single field="name" />   
                    </div>
                    <div class="flex-none px-3 my-auto">
                        <button type="submit" class="bg-indigo-500 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 active:bg-indigo-300">
                            Guardar etiqueta
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg">

                <x-table>
                    <x-slot:headings>
                        <x-table.heading>ID</x-table.heading>
                        <x-table.heading>Nombre</x-table.heading>
                        <x-table.heading>Fecha</x-table.heading>
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

                    @forelse ($tags as $tag)
                        <tr class="border-b">
                            <x-table.row>{{ $tag->id }}</x-table.row>
                            <x-table.row>{{ $tag->name }}</x-table.row>
                            <x-table.row>{{ $tag->created_at }}</x-table.row>
                            <x-table.row class="text-right">
                                <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                                    @csrf @method('delete')
                                    <button type="submit" class="bg-red-500 text-white font-bold text-xs px-3 py-1 rounded-full hover:bg-red-800 active:bg-red-400">
                                        Eliminar
                                    </button>
                                </form>
                            </x-table.row>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-2 px-2">No existen registros para el filtro seleccionado.</td>
                        </tr>
                    @endforelse
                </x-table>

                <div class="py-2 px-4">
                    {{ $tags->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
