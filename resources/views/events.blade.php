<x-layout>
    <div class="px-6 pt-24 pb-12 md:px-12 bg-gray-100 text-gray-800 text-center lg:text-left">

        <div class="container mx-auto xl:px-32">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="mt-12 lg:mt-0">
                    <h1 class="text-5xl md:text-6xl xl:text-7xl font-bold tracking-tight mb-12">Todo lo relacionado
                        <br /><span class="text-blue-600">a CONTPAQi</span>
                    </h1>
                    <p class="text-gray-600">
                        Suscribete a nuestro email de noticias, para recibir información sobre nuevos eventos ya sea en línea o presencial. 
                        Es totalmente sin costo. 
                        No te pierdas la información más reciente y saca el mayor provecho a tu inversión.
                    </p>
                </div>
                <div class="mb-12 lg:mb-0">
                    <div class="block rounded-lg shadow-lg bg-white px-6 py-12 md:px-12">
                        @if(!session('suscribed'))
                            <form action="{{ route('newSuscription') }}" method="POST">
                            @csrf 
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="mb-6">
                                        <input 
                                            type="text"
                                            name="name"
                                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                            placeholder="Nombre" />
                                        @error('name')
                                            <small class="inline-flex text-xs text-red-700">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-6">
                                        <input type="text"
                                            name="lastname"
                                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                            placeholder="Apellidos"/>
                                        @error('lastname')
                                            <small class="inline-flex text-xs text-red-700">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <input type="email"
                                    name="email"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    placeholder="Correo electrónico"/>
                                    @error('email')
                                        <small class="inline-flex text-xs text-red-700">{{ $message }}</small>
                                    @enderror
                                </div>
                                <input type="text"
                                    name="company"
                                    class="form-control block w-full px-3 py-1.5 mb-6 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    placeholder="Empresa" />
                                <div class="form-check flex justify-center mb-6">
                                    <input
                                        type="checkbox" 
                                        class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                        value="1" 
                                        name="accepted" 
                                        id="flexCheckChecked">
                                    <label class="form-check-label inline-block text-gray-800" for="flexCheckChecked">
                                        Subscribirme a las noticias
                                    </label>
                                    @error('accepted')
                                        <small class="inline-flex text-xs text-red-700">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button type="submit" 
                                    data-mdb-ripple="true" 
                                    data-mdb-ripple-color="light"
                                    class="inline-block px-6 py-2.5 mb-6 w-full bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                    Suscribirme</button>
                            </form>
                        @else 
                        <svg class="mb-2 w-10 h-10 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 5a3 3 0 015-2.236A3 3 0 0114.83 6H16a2 2 0 110 4h-5V9a1 1 0 10-2 0v1H4a2 2 0 110-4h1.17C5.06 5.687 5 5.35 5 5zm4 1V5a1 1 0 10-1 1h1zm3 0a1 1 0 10-1-1v1h1z" clip-rule="evenodd"></path><path d="M9 11H3v5a2 2 0 002 2h4v-7zM11 18h4a2 2 0 002-2v-5h-6v7z"></path></svg>
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">¡Gracias por suscribirte!</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-500">
                            {{ session('suscribed') }}, muy pronto recibirás en tu correo una confirmación del registro y cuando haya algún evento nuevo, se te informará por el mismo medio.
                        </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="my-24 text-gray-800 text-center">

        <h2 class="text-3xl font-bold mb-12 pb-4 text-center">Últimos eventos</h2>

        <div class="grid lg:grid-cols-3 gap-6 xl:gap-x-12">

            <article class="mb-6 lg:mb-0">
                <div class="relative block bg-white rounded-lg shadow-lg">
                    <div class="flex">
                        <div class="relative overflow-hidden bg-no-repeat bg-cover shadow-lg rounded-lg mx-4 -mt-4"
                            data-mdb-ripple="true" data-mdb-ripple-color="light">
                            <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/024.webp" class="w-full" />
                            <a href="#!">
                                <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed opacity-0 hover:opacity-100 transition duration-300 ease-in-out"
                                    style="background-color: rgba(251, 251, 251, 0.15)"></div>
                            </a>
                        </div>
                    </div>
                    <div class="p-6">
                        <h5 class="font-bold text-lg mb-3">My paradise</h5>
                        <p class="text-gray-500 mb-4">
                            <small>Published <u>13.01.2022</u> by
                                <a href="" class="text-gray-900">Anna Maria Doe</a></small>
                        </p>
                        <p class="mb-4 pb-2">
                            Ut pretium ultricies dignissim. Sed sit amet mi eget urna
                            placerat vulputate. Ut vulputate est non quam dignissim
                            elementum. Donec a ullamcorper diam.
                        </p>
                        <a href="#!" data-mdb-ripple="true" data-mdb-ripple-color="light"
                            class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Read
                            more</a>
                    </div>
                </div>
            </article>

            <article class="mb-6 lg:mb-0">
                <div class="relative block bg-white rounded-lg shadow-lg">
                    <div class="flex">
                        <div class="relative overflow-hidden bg-no-repeat bg-cover shadow-lg rounded-lg mx-4 -mt-4"
                            data-mdb-ripple="true" data-mdb-ripple-color="light">
                            <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/031.webp" class="w-full" />
                            <a href="#!">
                                <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed opacity-0 hover:opacity-100 transition duration-300 ease-in-out"
                                    style="background-color: rgba(251, 251, 251, 0.15)"></div>
                            </a>
                        </div>
                    </div>
                    <div class="p-6">
                        <h5 class="font-bold text-lg mb-3">Travel to Italy</h5>
                        <p class="text-gray-500 mb-4">
                            <small>Published <u>12.01.2022</u> by
                                <a href="" class="text-gray-900">Halley Frank</a></small>
                        </p>
                        <p class="mb-4 pb-2">
                            Suspendisse in volutpat massa. Nulla facilisi. Sed aliquet
                            diam orci, nec ornare metus semper sed. Integer volutpat
                            ornare erat sit amet rutrum.
                        </p>
                        <a href="#!" data-mdb-ripple="true" data-mdb-ripple-color="light"
                            class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Read
                            more</a>
                    </div>
                </div>
            </article>

            <article class="mb-0">
                <div class="relative block bg-white rounded-lg shadow-lg">
                    <div class="flex">
                        <div class="relative overflow-hidden bg-no-repeat bg-cover shadow-lg rounded-lg mx-4 -mt-4"
                            data-mdb-ripple="true" data-mdb-ripple-color="light">
                            <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/081.webp" class="w-full" />
                            <a href="#!">
                                <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed opacity-0 hover:opacity-100 transition duration-300 ease-in-out"
                                    style="background-color: rgba(251, 251, 251, 0.15)"></div>
                            </a>
                        </div>
                    </div>
                    <div class="p-6">
                        <h5 class="font-bold text-lg mb-3">Chasing the sun</h5>
                        <p class="text-gray-500 mb-4">
                            <small>Published <u>10.01.2022</u> by
                                <a href="" class="text-gray-900">Joe Svan</a></small>
                        </p>
                        <p class="mb-4 pb-2">
                            Curabitur tristique, mi a mollis sagittis, metus felis mattis
                            arcu, non vehicula nisl dui quis diam. Mauris ut risus eget
                            massa volutpat feugiat. Donec.
                        </p>
                        <a href="#!" data-mdb-ripple="true" data-mdb-ripple-color="light"
                            class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Read
                            more</a>
                    </div>
                </div>
            </article>
        </div>

    </div>
</x-layout>
