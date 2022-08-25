<x-app-layout>

    <section class="mt-2">
        <div class="container-fluid text-center">
            <div id="padre" class="">
                <img id="myimg" class="img-fluid card-img" src="/img/logo.jpg">
                <div class="hijo">
                    @guest
                        @livewire('search') 
                    @endguest
                </div>
            </div>
        </div>
    </section> 

    {{-- <section class="mt-8">
        <h1 class="text-gray-600 text-center text-3xl bt-6 mb-4">Contenido</h1>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="h-36 w-full object-cover" src="{{ asset('img/home/arc-de-triomphe-g4be97c524_640.jpg')}}" alt="">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Nivel 1</h1>
                </header>

                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Excepturi, sed in corrupti odio suscipit!</p>
            </article>
            <article>
                <figure>
                    <img class="h-36 w-full object-cover" src="{{ asset('img/home/ask-g8b8b234ee_640.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Nivel 2</h1>
                </header>

                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Excepturi, sed in corrupti odio suscipit!</p>
            </article>
            <article>
                <figure>
                    <img class="h-36 w-full object-cover" src="{{ asset('img/home/english-g796b151b4_640.png')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Nivel 3</h1>
                </header>

                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Excepturi, sed in corrupti odio suscipit!</p>
            </article>
            <article>
                <figure>
                    <img class="h-36 w-full object-cover" src="{{ asset('img/home/girl-gc9a54adc7_640.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Nivel 4</h1>
                </header>

                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Excepturi, sed in corrupti odio suscipit!</p>
            </article>

        </div>
    </section> --}}

    @guest
        <section class="mt-24 bg-gray-700 py-12">
            <h1 class="text-center text-white text-3xl">Inscríbete ya!</h1>
            <p class="text-center text-white">Registrate para iniciar tu camino al éxito.</p>
            <div class="flex justify-center mt-4">
                <a href="{{ route('courses.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Ir a inscripciones
                </a>
            </div>
        </section> 

    <section class="my-24">
        <h1 class="text-center text-3xl text-gray-600">Últimos cursos</h1>
        <p class="text-gray-500 text-sm text-center mb-6">Cursos nuevos y actualizados.</p>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($courses as $course)
            <x-course-card :course="$course"/>
            @endforeach
        </div>
    
    </section>
    @endguest

    @can('Tomar Cursos')
    <section class="mt-4">
    <h1 class="bg-gray-500 text-center text-white text-3xl mb-4">Exámenes Toefl asignados</h1>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($toefls as $toefl)
                <x-toefl-card :toefl="$toefl"/>
            @endforeach
        </div>
    </section>
    @endcan
    

</x-app-layout>

