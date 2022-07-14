<div>

    <article class="card mb-6">
        <div class="card-body bg-gray-100">
            <h3 class="text-center font-bold">Evaluacion {{$evaluation->name}} de curso {{$evaluation->course->title}}</h3>
        </div>
    </article>

    <div class="container py-4">
        <div class="pb-4 flex md:-mx-4">
            <div class="w-full mb-2 border rounded shadow-sm">
                <div id="relojito" class="float-right" wire:model="time"><time>00:00:00</time></div>
                {{$time}}
                <div class="card-body">
                    <p id="textito" class="mb-4">Da click para comenzar tu examen, te recomendamos no distraerte para poder terminar.</p>
                    <button id="iniciar" type="button" class="float-left mb-4 px-6 py-2.5 bg-blue-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-lg hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Iniciar</button>
                </div>
            </div>
            
        </div>
    </div>

    <div class="container py-4">
        <div class="pb-4 md:flex md:-mx-4">
            <div class="w-full mb-2 border rounded shadow-sm">
                @if ($current->url)
                <a href="#" class="mb-4 cursor-none">
                    <img class="rounded" src="/assets/docs/master/image-01.jpg">
                </a>
                @endif
                <hr>
                <div class="px-4 py-4">
                    <div>
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
    </div>
    


    <x-slot name="js">
        <script src="{{asset('js/alumno/evaluation.js')}}"></script>
    </x-slot>

</div>


