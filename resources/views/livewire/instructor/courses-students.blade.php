<div>

    <h1 class="text-2xl font-bold mb-4">Estudiantes del curso</h1>
    <x-table-responsive>
        <div class="px-6 py-4 ">
            <input wire:model="search" class=" w-full shadow appearance-none border rounded flex-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingresa tu busqueda...">
        </div>
        @if ($students->count())
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">
                        Nombre
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">
                        Email
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($students as $student)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="w-10 h-10 flex-shrink-0">
                                <img class="h-10 w-10 rounded-full object-cover object-center" src="{{$student->profile_photo_url}}"></div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{$student->name}}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{$student->email}}</div>
                   </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-right font-medium">
                        <a href="" class="btn btn-primary">Ver</a>
                    </td>
                </tr>      
                @endforeach     
            </tbody>
        </table>  
        
        <div class="px-6 py-4">
            {{$students->links()}}
        </div> 
        @else
          <div class="px-6 py-4">No hay registros coincidentes...</div>  
        @endif
        
    </x-table-responsive>

</div>
