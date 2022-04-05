<div>
    <x-slot name="course">
        {{$course->slug}}
    </x-slot>

    <h1 class="text-2xl font-bold">Lecciones del curso</h1>
    <hr class="mt-2 mb-6">

    @foreach ($course->sections as $item)
    <article class="card mb-6" x-data="{open: true}">
        <div class="card-body bg-gray-100">
            @if ($section->id == $item->id)
                <form wire:submit.prevent = "update">
                    <input class="form-input w-full" wire:model="section.name" placeholder="Ingresa el nombre de la sección...">
                </form>
                @error('section.name')
                    <strong class="test-xs text-red-600">{{$message}}</strong>
                @enderror
            @else
            <header class="flex justify-between item-center">
                <h1 x-on:click="open = !open" class="cursor-pointer"><strong>Sección:</strong>{{$item->name}}</h1>
                <div>
                    <i class="fas fa-edit cursor-pointer text-blue-500" wire:click="edit({{$item}})"></i>
                    <i class="fas fa-eraser cursor-pointer text-red-500" wire:click="destroy({{$item}})"></i>
                </div>
            </header>

            <div x-show="open">
                @livewire('instructor.courses-lesson', ['section' => $item], key($item->id))
            </div>

            @endif
        </div>
    </article>
    @endforeach

    <div x-data="{open: false}">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nueva sección
        </a>

        <article class="card" x-show="open">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font-bold mb-4">Agregar nueva sección</h1>
                <div class="mb-4">
                    <input wire:model="name" class="form-input w-full" placeholder="Escribe el nombre de la sección">
                    @error('name')
                    <strong class="test-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button class="btn btn-primary" wire:click="store">Agregar</button>
                    <button class="btn btn-danger ml-2" x-on:click="open=false">Cancelar</button>
                </div>
            </div>
        </article>
    </div>
    
    
</div>
