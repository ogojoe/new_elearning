<x-app-layout>
    <section class="bg-cover mb-4 mt-4" style="background-image: url({{ asset('img/cursos/banerindexstudent.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h1 class="text-white font-bold text-6xl m-2">Mis cursos</h1>
        </div>
    </section>

    @livewire('courses-index')
</x-app-layout>