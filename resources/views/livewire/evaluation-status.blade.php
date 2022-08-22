<div x-data="{open: true}">

     <div class="card mb-6">
        <div class="card-body bg-gray-100">
            <h3 class="text-center font-bold">Evaluación {{$evaluation->name}} de curso {{$evaluation->course->title}}</h3>
        </div>
    </div>

    <div class="flex justify-center" >
        <div class="block rounded-lg shadow-lg bg-white max-w-sm text-center">
            <div class="py-3 px-6 border-b border-gray-300" x-show="!open">
                <h1 id="relojito" class="content-center">Tiempo : <time>00:00:00</time>
            </div>
            <div class="p-6" x-show="open">
                <div id="textito" class="ml-4">
                    @if (count($evaluation->questions))
                        <p class="mb-4">Da click para comenzar tu examen, te recomendamos no distraerte para poder terminar.</p>
                        <button id="iniciar" x-on:click="open = !open" type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Iniciar</button>                         
                    @else
                    <p class="mb-4">Aun estamos preparando tu examen, por favor vuelve mas tarde.</p>
                    @endif
                       
                </div>
            </div>
            
        </div>
    </div>

    <div class="container py-4" x-show="!open">
        @if (count($evaluation->questions))
            <div id="preguntas" class="pb-4 hidden md:flex md:-mx-4">
                <div class="w-full mb-2 border rounded shadow-sm">
                    <hr>
                    <div class="px-4 py-4">
                        <div>
                            @if ($current->url)
                            <audio controls>
                                <source src="{{asset('/storage/questions/'.$current->url)}}" type="audio/mpeg">
                              Your browser does not support the audio element.
                            </audio>
                            @endif
                            <p class="text-center font-semibold leading-tight text-2xl text-gray-800">
                                {{$current->name}}
                            </p>
                        </div>
                        <hr>
                        <div class="mt-4 mb-4 flex justify-center">
                            <ul class="bg-white rounded-lg border border-gray-200 text-gray-900 w-full">
                                @foreach ($current->answers as $answer)
                                    <li class="px-2 py-2 border-b border-gray-200 w-full 
                                    {{$loop->first ?'rounded-t-lg':''}} {{$loop->last ?'rounded-b-lg':''}}
                                    {{in_array($answer->id,$selected)? 'bg-blue-600 text-white':''}}">
                                        {{$answer->name}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        
                        <hr>
                        <div class="grid gap-4 grid-cols-3 grid-rows-1 text-gray-700 text-sm py-4">
                            <div>
                                @if ($this->previous) 
                                <button type="button" wire:click="changeQuestion({{$this->previous->id}})" class="float-left px-6 py-2.5 bg-blue-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-lg hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Anterior</button>
                                @endif
                            </div>
                            <div></div>
                            <div>
                                @if ($this->next)
                                <button type="button" wire:click="changeQuestion({{$this->next->id}})" class="float-right px-6 py-2.5 bg-blue-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-lg hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Siguiente</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        
        @else
            <h1>Aun estamos preparando el material, porfavor vuelve más tarde.</h1>
        @endif
    </div>
    


    <x-slot name="js">
        <script src="{{asset('js/alumno/evaluation.js')}}"></script>
    </x-slot>

</div>


