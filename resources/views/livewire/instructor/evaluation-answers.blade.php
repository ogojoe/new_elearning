<div>
    @foreach ($question->answers as $item)
        <article class="card mt-4" x-data="{open: false}">
            <div class="card-body" x-on:click.outside="open = false">
                @if ($answer->id == $item->id)
                    <form wire:submit.prevent="update">
                        <div class="flex items-center">
                            <label class="w-32">Respuesta:</label>
                            <input wire:model="answer.name" class="form-input w-full">

                        </div>

                        @error('answer.name')
                         <strong class="test-xs text-red-600">{{$message}}</strong>
                        @enderror

                        <label class="text-sm">
                            <input type="checkbox" wire:model="answer.is_correct">
                            <span class="font-weight-bold">Marcar como correcta</span> 
                        </label>

                        <div class="mt-4 flex justify-end">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <button type="button" class="btn btn-danger ml-2" wire:click="cancel" >Cancelar</button>
                        </div>

                    </form>

                @else
                    <header>
                        <h1 x-on:click="open = !open" class="cursor-pointer">
                            @if ($item->is_correct)
                                <i class="far fa-check-circle text-blue-500 mr-1"></i> 
                                @else
                                <i class="far fa-circle text-blue-500 mr-1"></i> 
                            @endif
                            Respuesta: {{$item->name}}
                        </h1>
                    </header>

                    <div x-show="open">
                        <hr class="my-2">
                        {{-- <span class="badge badge-pill badge-primary"> 
                            {{$item->is_correct ? 'Respuesta correcta' : ''}}
                        </span> --}}
                        
                        <div class="my-2">
                            <button class="btn btn-primary text-sm" wire:click="edit({{$item}})">Editar</button>
                            <button class="btn btn-danger text-sm" wire:click="destroy({{$item}})">Eliminar</button>
                        </div>

                    </div>
                @endif
                
            </div>
        </article>
    @endforeach


    <div x-data="{open: false}" class="mt-4">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar Respuesta
        </a>

        <article class="card" x-show="open">
            <div class="card-body" x-on:click.outside="open = false">
                <h1 class="text-xl font-bold mb-4">Agregar respuesta</h1>
                <div class="mb-4">
                    <div class="flex items-center">
                        <input wire:model="name" class="form-input w-full">
                    </div>

                    @error('name')
                     <strong class="test-xs text-red-600">{{$message}}</strong>
                    @enderror

                    <div class="flex items-center mt-4">
                        <label class="text-sm">
                            <input type="checkbox" wire:model="is_correct" value="1">
                           <span class="font-weight-bold">Marcar como correcta</span> 
                        </label>
                    </div>

                    <div class="flex justify-end mt-4">
                        <button class="btn btn-primary" wire:click="store">Agregar</button>
                        <button class="btn btn-danger ml-2" x-on:click="open=false">Cancelar</button>
                    </div>
            </div>
        </article>
    </div>
</div>
