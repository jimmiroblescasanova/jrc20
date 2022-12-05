<x-layout>

    <div class="bg-gray-200 pt-16 md:pt-24 md:pb-8 md:px-12">

        <div class="container mx-auto px-5 xl:px-32">
            @include('events._intro')
        </div>
    </div>

    <div class="my-24 text-gray-800 text-center">
        <h2 id="search-section" class="text-3xl font-bold mb-8 pb-4 text-center">Búsqueda</h2>

        <div class="grid lg:grid-cols-3 gap-6 xl:gap-x-12 justify-around px-10">

            @foreach ($results as $event)
                <a href="{{ route('guest.events.show', $event) }}"
                    class="flex flex-col items-center bg-white border rounded-lg shadow-md md:flex-row md:max-w-xl hover:bg-gray-100">
                    <img class="object-cover rounded-t-lg max-h-48 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                        src="{{ asset($event->image) }}" alt="{{ $event->title }}">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                            {{ $event->title }}
                        </h5>
                        <p class="mb-3 font-normal">
                            <span @class([
                                'bg-green-200' => $event->date > NOW(),
                                'bg-red-200' => $event->date <= NOW(),
                                'py-1',
                                'px-2',
                                'text-xs',
                                'rounded',
                                'font-normal',
                                'lowercase',
                            ])>
                                {{ $event->date->diffForHumans() }}
                            </span>
                        </p>
                    </div>
                </a>
            @endforeach

        </div>
    </div>

    <x-slot name="scripts">
        <script>
            window.addEventListener('DOMContentLoaded', (event) => {
                window.location.hash = 'search-section';
            });
        </script>
    </x-slot>

</x-layout>
