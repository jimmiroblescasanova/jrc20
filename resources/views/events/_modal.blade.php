<!--Modal-->
<div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="my-modal">
    <!--modal content-->
    <div class="relative top-32 md:top-20 mx-auto p-5 border w-4/5 md:w-2/5 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <!-- Modal body -->
            <form action="{{ route('guest.events.invite', $event) }}" method="POST">
                @csrf 
                <div class="mt-2 px-7 py-3">
                    <x-input-icon name="name" label="Tu nombre" required>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-500 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </x-input-icon>
                    <x-input-icon type="email" name="email" label="Ingresa el correo de tu invitado" placeholder="ejemplo@mail.com" required>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-500 w-6 h-6">
                            <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                        </svg>
                    </x-input-icon>
                </div>
                <div class="space-y-3 md:space-y-0 md:flex md:space-x-10 px-3 py-4">
                    <button type="submit" class="inline-flex items-center justify-center px-4 py-2 bg-indigo-500 text-white text-base font-medium rounded-md w-full hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mr-2 w-5 h-5">
                            <path d="M3.105 2.289a.75.75 0 00-.826.95l1.414 4.925A1.5 1.5 0 005.135 9.25h6.115a.75.75 0 010 1.5H5.135a1.5 1.5 0 00-1.442 1.086l-1.414 4.926a.75.75 0 00.826.95 28.896 28.896 0 0015.293-7.154.75.75 0 000-1.115A28.897 28.897 0 003.105 2.289z" />
                        </svg>
                        Compartir
                    </button>
                    <button id="ok-btn" class="inline-flex items-center justify-center px-4 py-2 bg-white border rounded-md w-full hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
