@props(['course'])

<article class="card flex flex-col">
    @if ($course->image)
    <img class="h-32 w-full object-cover" src="{{ $course->image->url?Storage::url($course->image->url):"/img/cursos/school-g87677ea84_1920.jpg"}}" alt="">   
    @else
    <img class="h-32 w-full object-cover" src="/img/cursos/school-g87677ea84_1920.jpg" alt="">   
    @endif
    
    <div class="card-body flex-1 flex flex-col">
        <h1 class="card-title">{{ Str::limit($course->title,25)}}</h1>
       {{--  <p class="text-gray-500 text-sm mb-2 mt-auto">Creator:{{$course->instructor->name}}</p> --}}
        
        <div class="flex mb-2">
            <ul class="flex text-sm">
                <li class="mr-1"><i class="fas fa-star {{$course->rating >= 1 ? 'text-yellow-400' : 'text-gray-400'}}"></i></li>
                <li class="mr-1"><i class="fas fa-star {{$course->rating >= 2 ? 'text-yellow-400' : 'text-gray-400'}}"></i></li>
                <li class="mr-1"><i class="fas fa-star {{$course->rating >= 3 ? 'text-yellow-400' : 'text-gray-400'}}"></i></li>
                <li class="mr-1"><i class="fas fa-star {{$course->rating >= 4 ? 'text-yellow-400' : 'text-gray-400'}}"></i></li>
                <li class="mr-1"><i class="fas fa-star {{$course->rating >= 5 ? 'text-yellow-400' : 'text-gray-400'}}"></i></li>
            </ul>

            <p class="text-sm text-gray-500 ml-auto">
                <i class="fas fa-users"></i>
                {{-- ({{$course->students_count}}) --}}
            </p>
        </div>
        
        {{-- <a href="{{Route('courses.show',$course)}}" class=" btn btn-primary btn-block py-4 px-4 ">
            Más información
        </a> --}}

        @can('enrolled', $course)
            <a href="{{Route('courses.status',$course)}}" class="btn btn-danger btn-block mt-4">Continuar al curso</a>
        @endcan
    </div>
</article>