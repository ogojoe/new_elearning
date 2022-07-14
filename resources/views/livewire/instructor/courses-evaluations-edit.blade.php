<div>
    <h1 class="text-2xl font-bold">Bateria de preguntas de evaluación {{$evaluation->name}}</h1>
    <hr class="mt-2 mb-6">

    <h1 class="text-2xl font-bold">Grammar</h1>
    <hr class="mt-2 mb-6">

    @foreach ($evaluation->questions->where('skill_id', 1) as $item)
    <article class="card mb-6" x-data="{open: true}" >
        <div class="card-body bg-gray-100" x-on:click.outside="open = false">
            @if ($question->id == $item->id)
                <form wire:submit.prevent = "update">
                    <input class="form-input w-full" wire:model="question.name" placeholder="Ingresa la pregunta">
                </form>
                @error('question.name')
                    <strong class="test-xs text-red-600">{{$message}}</strong>
                @enderror
            @else
            <header class="flex justify-between item-center">
                <h1 x-on:click="open = !open" class="cursor-pointer"><strong>Pregunta:</strong>{{$item->name}}</h1>
                <div>
                    <i class="fas fa-edit cursor-pointer text-blue-500" wire:click="edit({{$item}})"></i>
                    <i class="fas fa-eraser cursor-pointer text-red-500" wire:click="destroy({{$item}})"></i>
                </div>
            </header>

            <div x-show="open">
                @livewire('instructor.evaluation-answers', ['question' => $item], key($item->id))
            </div>

            @endif
        </div>
    </article>
    @endforeach

    <div x-data="{open: false}">
        <a x-show="!open" x-on:click="open = true" class="ml-4 flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar pregunta Grammar
        </a>

        <article class="card" x-show="open" x-on:click.outside="open = false">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font-bold mb-4">Agregar nueva pregunta</h1>
                <div class="mb-4">
                    <input wire:model="name" class="form-input w-full" placeholder="Escribe la pregunta">
                    @error('name')
                    <strong class="test-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button class="btn btn-primary" wire:click="store(1)">Agregar</button>
                    <button class="btn btn-danger ml-2" x-on:click="open=false">Cancelar</button>
                </div>
            </div>
        </article>
    </div>



    <hr class="mt-6">
    <h1 class="text-2xl font-bold">Listening</h1>
    <hr class="mt-2 mb-6">

    @foreach ($evaluation->questions->where('skill_id', 2) as $item)
    <article class="card mb-6" x-data="{open: true}" >
        <div class="card-body bg-gray-100" x-on:click.outside="open = false">
            @if ($question->id == $item->id)
                <form wire:submit.prevent = "update">
                    <input class="form-input w-full" wire:model="question.name" placeholder="Ingresa la pregunta">
                </form>
                @error('question.name')
                    <strong class="test-xs text-red-600">{{$message}}</strong>
                @enderror
            @else
            <header class="flex justify-between item-center">
                <h1 x-on:click="open = !open" class="cursor-pointer"><strong>Pregunta:</strong>{{$item->name}}</h1>
                <div>
                    <i class="fas fa-edit cursor-pointer text-blue-500" wire:click="edit({{$item}})"></i>
                    <i class="fas fa-eraser cursor-pointer text-red-500" wire:click="destroy({{$item}})"></i>
                </div>
            </header>

            <div x-show="open">
                @livewire('instructor.evaluation-answers', ['question' => $item], key($item->id))
            </div>

            @endif
        </div>
    </article>
    @endforeach

    <div x-data="{open: false}">
        <a x-show="!open" x-on:click="open = true" class="ml-4 flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar pregunta Listening
        </a>

        <article class="card" x-show="open" x-on:click.outside="open = false">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font-bold mb-4">Agregar nueva pregunta</h1>
                <div class="mb-4">
                    <input wire:model="name" class="form-input w-full" placeholder="Escribe la pregunta">
                    @error('name')
                    <strong class="test-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button class="btn btn-primary" wire:click="store(2)">Agregar</button>
                    <button class="btn btn-danger ml-2" x-on:click="open=false">Cancelar</button>
                </div>
            </div>
        </article>
    </div>

    <hr class="mt-6">
    <h1 class="text-2xl font-bold">Reading</h1>
    <hr class="mt-2 mb-6">

    @foreach ($evaluation->questions->where('skill_id', 3) as $item)
    <article class="card mb-6" x-data="{open: true}" >
        <div class="card-body bg-gray-100" x-on:click.outside="open = false">
            @if ($question->id == $item->id)
                <form wire:submit.prevent = "update">
                    <input class="form-input w-full" wire:model="question.name" placeholder="Ingresa la pregunta">
                </form>
                @error('question.name')
                    <strong class="test-xs text-red-600">{{$message}}</strong>
                @enderror
            @else
            <header class="flex justify-between item-center">
                <h1 x-on:click="open = !open" class="cursor-pointer"><strong>Pregunta:</strong>{{$item->name}}</h1>
                <div>
                    <i class="fas fa-edit cursor-pointer text-blue-500" wire:click="edit({{$item}})"></i>
                    <i class="fas fa-eraser cursor-pointer text-red-500" wire:click="destroy({{$item}})"></i>
                </div>
            </header>

            <div x-show="open">
                @livewire('instructor.evaluation-answers', ['question' => $item], key($item->id))
            </div>

            @endif
        </div>
    </article>
    @endforeach

    <div x-data="{open: false}">
        <a x-show="!open" x-on:click="open = true" class="ml-4 flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar pregunta Reading
        </a>

        <article class="card" x-show="open" x-on:click.outside="open = false">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font-bold mb-4">Agregar nueva pregunta</h1>
                <div class="mb-4">
                    <input wire:model="name" class="form-input w-full" placeholder="Escribe la pregunta">
                    @error('name')
                    <strong class="test-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button class="btn btn-primary" wire:click="store(3)">Agregar</button>
                    <button class="btn btn-danger ml-2" x-on:click="open=false">Cancelar</button>
                </div>
            </div>
        </article>
    </div>


</div>
