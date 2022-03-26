<x-instructor-layout>
    <h1 class="text-2xl font-bold">Información del curso</h1>
    <hr class="mt-2 mb-6">
    {!! Form::model($course, ['route' => ['instructor.courses.update',$course],'method'=>'put','files' =>true]) !!}
        
    @include('instructor.courses.partials.form')

        <div class="flex justify-end">
            {!! Form::submit('Actualizar informacion', ['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/courses/form.js')}}"></script>
    </x-slot>
</x-instructor-layout>