<div>

    <h1 class="text-2xl font-bold">Evaluaciones del curso</h1>
    
    <div x-data="{open: false}" >
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nueva evaluación
        </a>

        <article class="card" x-show="open">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font-bold mb-4">Agregar nueva evaluacion</h1>
                <div class="mb-4">
                    <input wire:model="name" class="form-input w-full" placeholder="Escribe el parcial de la evaluacion">
                    @error('name')
                    <strong class="test-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button class="btn btn-primary" x-on:click="open=false" wire:click="store">Agregar</button>
                    <button class="btn btn-danger ml-2" x-on:click="open=false">Cancelar</button>
                </div>
            </div>
        </article>
    </div>
    <hr class="mb-6">

    <x-table-responsive>
        
        @if ($evaluations->count())
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">
                        Parcial
                    </th>
                    <th scope="col" class="relative px-6 py-3 text-xs font-medium text-gray-500 uppercase">
                        Opciones
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($evaluations as $eval)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                       {{$eval->name}} 
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-right font-medium">
                        <a href="{{route('instructor.courses.evaluations.edit', [$course,$eval])}}" class="btn btn-primary">Editar</a>
                        <button class="btn btn-primary" wire:click="destroy({{$eval}})">Eliminar</button>
                    </td>
                </tr>      
                @endforeach     
            </tbody>
        </table>  
        
       
        @else
          <div class="px-6 py-4">No hay registros coincidentes...</div>  
        @endif
        
    </x-table-responsive>

</div>
