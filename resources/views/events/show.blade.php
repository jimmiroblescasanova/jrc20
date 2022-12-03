<x-layout>

    <div class="bg-gray-200 pb-12 md:h-screen pt-16 md:pt-24 md:pb-8">
        <div class="bg-white mx-auto items-center w-4/5 md:flex md:h-144 rounded-lg border shadow-md md:flex-row">
            <img src="{{ asset('storage/' . $event->image) }}"
                class="object-fill md:object-cover md:h-full md:hover:object-scale-down rounded-t-lg md:w-1/2 md:max-w-2xl md:rounded-none md:rounded-l-lg"
                alt="">
            <div class="grid h-full justify-between p-8 leading-normal">
                <div>
                    <h5 class="mb-5 text-2xl uppercase font-bold -tracking-tight text-gray-900">
                        {{ $event->title }}
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
                    </h5>
                    <span class="text-xs">tags: 
                        @foreach ($event->tags as $tag)
                            <span class="bg-blue-400 text-white shadow-sm px-2 py-1 rounded-full lowercase">{{ $tag->name }}</span>
                        @endforeach
                    </span>
                </div>
                <div class="flex flex-col">
                    <span class="mb-3 text-gray-700">
                        Fecha: {{ $event->date->format('d/m/Y') }}</span>
                    </span>

                    <span class="mb-1">Expositor: {{ $event->subtitle }}</span>
                    <span class="mb-3 font-normal text-gray-700">
                        Descripción: {{ $event->summary }}
                    </span>
                </div>
                <div class="flex flex-col space-y-3 items-center">
                    @if ($event->date > NOW())
                        <a href="{{ route('guest.registration.register', $event) }}"
                            class="bg-blue-500 text-white text-center rounded p-2 hover:bg-blue-600 active:bg-blue-800 inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="mr-2 w-5 h-5">
                                <path
                                    d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                <path
                                    d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                            </svg>
                            Registrarme a este evento
                        </a>
                    @endif
                    <button type="button" id="share" class="border border-gray-400 text-gray-800 hover:bg-gray-200 rounded py-2 px-4 inline-flex items-center justify-center">
                        <svg class="mr-2 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
                        Compartir a un amigo
                    </button>
                </div>
            </div>
        </div>
    </div>

    @include('events._modal')

    <x-slot name="scripts">
        <script>
            const shareBtn = document.getElementById('share');
            // vars for the modal   
            const overlay = document.getElementById("overlay");
            const modal = document.getElementById("modal");
            const closeModalBtn = document.getElementById("closeModalBtn");

            const shareData = {
                title: 'JRC Tecnología',
                text: '{{ $event->title }}',
                url: '{{ route('guest.events.show', $event->slug) }}',
            }

            var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
            if (isMobile) {
                shareBtn.addEventListener('click', async () => {
                    try {
                        await navigator.share(shareData);
                    } catch (err) {
                        console.log(err);
                    }
                });
            } else {
                shareBtn.addEventListener('click', () => {
                    overlay.classList.toggle('hidden');
                    modal.showModal();
                });

                closeModalBtn.addEventListener('click', () => {
                    modal.close();
                });
            }
            modal.addEventListener('close', (event) => {
                overlay.classList.toggle('hidden');
            });
        </script>
    </x-slot>
</x-layout>
