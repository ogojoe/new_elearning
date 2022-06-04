<h4>Alumnos</h4>
<hr class="mt-2 mb-6">
@error('students')
<br>
    <small class="text-danger">
        <strong>{{$message}}</strong>
    </small>
@enderror
@foreach ($students as $student)

<div>
    {{-- {!! Form::checkbox('students[]', $student->id, null , ['class'=>'mr-1']) !!}{{$student->name}} | {{$student->user->email}} |  --}}
    @if ($group_students_id->contains($student->id))
        <input class="mr-1" name="students[]" type="checkbox" value="{{ $student->id }}" checked>
            {{$student->name}} | {{$student->user->email}} |
        </input>
    @else
    <input class="mr-1" name="students[]" type="checkbox" value="{{ $student->id }}">
        {{$student->name}} | {{$student->user->email}} |
    </input>
    @endif

</div>
    
@endforeach