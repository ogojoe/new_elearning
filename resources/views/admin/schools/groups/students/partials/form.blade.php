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
    <label>
        {!! Form::checkbox('students[]', $student->id, null, ['class'=>'mr-1']) !!} 
        {{$student->name}}
     </label>
</div>
    
@endforeach