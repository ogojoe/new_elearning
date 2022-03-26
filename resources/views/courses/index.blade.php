<x-app-layout>
    <section class="bg-cover" style="background-image: url({{ asset('img/cursos/school-g87677ea84_1920.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">Los mejores cursos</h1>
                <p class="text-white text-lg mt-2 mb-4">
                    Apoyate con los videos, materiales y maestros que estaran disponibles para una mejor atencion.
                </p>

                @livewire('search')
            </div>
        </div>
    </section>

    @livewire('courses-index')
</x-app-layout>