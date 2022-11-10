<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>Notificaciones recientes: </p>
                    @foreach (auth()->user()->unreadNotifications as $notification) 
                        <li>{{ $notification->data['name'] }}, {{ $notification->data['email'] }}</li>
                    @endforeach

                    @if (auth()->user()->unreadNotifications->count() >= 1)
                        <form action="{{ route('admin.readAll') }}" method="POST">
                            @csrf
                            <button type="submit" class="p-2 bg-white border rounded-md text-gray-800 hover:bg-gray-400">Leer todas las notificaciones</button>
                        </form>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
