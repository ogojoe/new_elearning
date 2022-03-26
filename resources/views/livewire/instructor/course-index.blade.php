<div class="container py-8">
    <x-table-responsive>
        <div class="px-6 py-4 flex">
            <input wire:keydown="limpiar_page" wire:model="search" class="shadow appearance-none border rounded flex-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingresa tu busqueda...">
            <a class="btn btn-danger ml-2" href="{{route('instructor.courses.create')}}">Nuevo curso</a>
        </div>
        @if ($courses->count())
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">
                        Nombre
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">
                        Matriculados
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">
                        Calificacion
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">
                        Status
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($courses as $course)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="w-10 h-10 flex-shrink-0">
                                @isset($course->image)
                                <img class="h-10 w-10 rounded-full object-cover object-center" src="/storage/{{$course->image->url}}"></div>
                                @else
                                <img class="h-10 w-10 rounded-full object-cover object-center" src="/img/cursos/miroshnichenko.jpg"></div>
                                @endisset
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{$course->title}}</div>
                                <div class="text-left text-gray-500">{{$course->category->name}}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{$course->students->count()}}</div>
                        <div class="text-sm text-gray-500">Alumnos Matriculados</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 flex items-center">
                            <ul class="flex text-sm ml-2">
                                <li class="mr-1"><i class="fas fa-star {{$course->rating >= 1 ? 'text-yellow-400' : 'text-gray-400'}}"></i></li>
                                <li class="mr-1"><i class="fas fa-star {{$course->rating >= 2 ? 'text-yellow-400' : 'text-gray-400'}}"></i></li>
                                <li class="mr-1"><i class="fas fa-star {{$course->rating >= 3 ? 'text-yellow-400' : 'text-gray-400'}}"></i></li>
                                <li class="mr-1"><i class="fas fa-star {{$course->rating >= 4 ? 'text-yellow-400' : 'text-gray-400'}}"></i></li>
                                <li class="mr-1"><i class="fas fa-star {{$course->rating >= 5 ? 'text-yellow-400' : 'text-gray-400'}}"></i></li>
                            </ul>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @switch($course->status)
                            @case(1)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Borrador
                            </span>
                                @break
                            @case(2)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Revision
                            </span>
                                @break
                            @case(3)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Publicado
                            </span>
                                @break
                            @default
                                
                        @endswitch
                    
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-right font-medium">
                        <a href="{{route('instructor.courses.edit',$course)}}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>      
                @endforeach     
            </tbody>
        </table>  
        
        <div class="px-6 py-4">
            {{$courses->links()}}
        </div> 
        @else
          <div class="px-6 py-4">No hay registros coincidentes...</div>  
        @endif
        
    </x-table-responsive>    
</div>
