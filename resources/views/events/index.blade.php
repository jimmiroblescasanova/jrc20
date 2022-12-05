<x-layout>

    <div class="bg-gray-200 pt-16 md:pt-24 md:pb-8 md:px-12">

        <div class="container mx-auto px-5 xl:px-32">
            @include('events._intro')
        </div>
    </div>

    <div class="my-24 text-gray-800 text-center">

        <h2 class="text-3xl font-bold mb-12 pb-4 text-center">Últimos eventos</h2>

        <div class="grid lg:grid-cols-3 gap-6 xl:gap-x-12">
            @foreach ($events as $event)
                <x-event.article :model="$event" />
            @endforeach
        </div>

    </div>
</x-layout>
