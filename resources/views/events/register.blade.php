<x-layout>

    <div class="bg-gray-100 h-screen pt-16 md:pt-24 md:pb-8">
        <div class="bg-white p-5 mx-auto items-center w-4/5 md:h-144 rounded-lg border shadow-md">
            <form action="{{ route('guest.registration.store', $event) }}" method="post">
                @csrf 
                <fieldset class="border p-4 rounded">
                    <legend class="px-4 text-center uppercase font-medium">Evento: {{ $event->title }}</legend>
                    <div id="group-name" class="mb-3">
                        <label 
                            for="input-name" 
                            class="block mb-2 text-sm font-medium text-gray-800">
                            Nombre completo</label>
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-500">
                                    <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
                                </svg>
                            </div>
                            <input 
                                type="text"
                                id="input-name" 
                                name="name"
                                class="pl-10 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full block"
                                placeholder="Nombre completo">
                        </div>
                        <x-input-error-single field="name" />
                    </div>
                    <div id="group-mail" class="mb-3">
                        <label 
                            for="input-email" 
                            class="block mb-2 text-sm font-medium text-gray-800">
                            Correo electrónico</label>
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-500">
                                    <path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                                    <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                                </svg>
                            </div>
                            <input 
                                type="email" 
                                id="input-email"
                                name="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                placeholder="ejemplo@mail.com">
                        </div>
                        <x-input-error-single field="email" />
                    </div>
                    <div id="group-phone" class="mb-3">
                        <label 
                            for="input-phone" 
                            class="block mb-2 text-sm font-medium text-gray-800">
                            Número de teléfono</label>
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-500">
                                    <path d="M8 16.25a.75.75 0 01.75-.75h2.5a.75.75 0 010 1.5h-2.5a.75.75 0 01-.75-.75z" />
                                    <path fill-rule="evenodd" d="M4 4a3 3 0 013-3h6a3 3 0 013 3v12a3 3 0 01-3 3H7a3 3 0 01-3-3V4zm4-1.5v.75c0 .414.336.75.75.75h2.5a.75.75 0 00.75-.75V2.5h1A1.5 1.5 0 0114.5 4v12a1.5 1.5 0 01-1.5 1.5H7A1.5 1.5 0 015.5 16V4A1.5 1.5 0 017 2.5h1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input 
                                type="tel" 
                                id="input-phone"
                                name="phone"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                placeholder="999 999 9999">
                        </div>
                        <x-input-error-single field="phone" />
                    </div>
                    <div id="group-company">
                        <label 
                            for="input-company" 
                            class="block mb-2 text-sm font-medium text-gray-800">
                            Empresa que represento</label>
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-500">
                                    <path fill-rule="evenodd" d="M6 3.75A2.75 2.75 0 018.75 1h2.5A2.75 2.75 0 0114 3.75v.443c.572.055 1.14.122 1.706.2C17.053 4.582 18 5.75 18 7.07v3.469c0 1.126-.694 2.191-1.83 2.54-1.952.599-4.024.921-6.17.921s-4.219-.322-6.17-.921C2.694 12.73 2 11.665 2 10.539V7.07c0-1.321.947-2.489 2.294-2.676A41.047 41.047 0 016 4.193V3.75zm6.5 0v.325a41.622 41.622 0 00-5 0V3.75c0-.69.56-1.25 1.25-1.25h2.5c.69 0 1.25.56 1.25 1.25zM10 10a1 1 0 00-1 1v.01a1 1 0 001 1h.01a1 1 0 001-1V11a1 1 0 00-1-1H10z" clip-rule="evenodd" />
                                    <path d="M3 15.055v-.684c.126.053.255.1.39.142 2.092.642 4.313.987 6.61.987 2.297 0 4.518-.345 6.61-.987.135-.041.264-.089.39-.142v.684c0 1.347-.985 2.53-2.363 2.686a41.454 41.454 0 01-9.274 0C3.985 17.585 3 16.402 3 15.055z" />
                                </svg>
                            </div>
                            <input 
                                type="text" 
                                id="input-company"
                                name="company"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                placeholder="MI EMPRESA SA DE CV">
                        </div>
                        <x-input-error-single field="company" />
                    </div>
                </fieldset>
                <div class="py-3 flex flex-col space-y-3">
                    <button 
                        type="submit" 
                        class="block w-full text-white bg-blue-500 p-2 rounded hover:-translate-y-1 hover:bg-blue-600 duration-300 hover:scale-110 cursor-pointer">
                        Guardar registro
                    </button>
                    <button 
                        type="button"
                        onclick="history.back();"
                        class="w-full text-gray-800 border p-2 rounded hover:bg-gray-200 inline-flex items-center place-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mr-2 w-5 h-5">
                            <path fill-rule="evenodd" d="M7.793 2.232a.75.75 0 01-.025 1.06L3.622 7.25h10.003a5.375 5.375 0 010 10.75H10.75a.75.75 0 010-1.5h2.875a3.875 3.875 0 000-7.75H3.622l4.146 3.957a.75.75 0 01-1.036 1.085l-5.5-5.25a.75.75 0 010-1.085l5.5-5.25a.75.75 0 011.06.025z" clip-rule="evenodd" />
                        </svg>
                        Atrás
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-layout>
