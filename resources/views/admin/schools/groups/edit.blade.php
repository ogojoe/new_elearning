@extends('adminlte::page')

@section('title', 'Grupos')

@section('content_header')
    <h1>Crear grupo en {{ $school->name }} </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($group,['route' => ['admin.school.group.update',['school'=>$school, 'group'=>$group]],'method'=> 'PUT']) !!}
            @include('admin.schools.groups.partials.form')

                {!! Form::submit('Actualizar grupo', ['class'=>'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}

            <blockquote>
                <p>Curso: {{ Str::limit($group->course->title,25)}} </p>
                <small>{{ Str::limit($group->course->subtitle,15)}} en <cite title="Source Title">{{$group->course->slug}}</cite></small>
            </blockquote>

            <div>
                <form action="{{route('admin.school.group.destroy',['school'=>$school, 'group'=>$group])}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger show_confirm" type="submit">Eliminar</button>
                </form>
            </div>


        </div>

    </div>

@stop

@section('css')

@stop

@section('js')
<script>

    $('.show_confirm').click(function(event) {
      var form =  $(this).closest("form");
      event.preventDefault();
      Swal.fire({
        title: '¿Estas seguro de eliminar este grupo?',
        showDenyButton: true,
        confirmButtonColor: '#008000',
        confirmButtonText: 'Eliminar',
        denyButtonText: `Cancelar`,
      })
      .then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }else if (result.isDenied) {
            Swal.fire('El grupo no se eliminó', '', 'info')
        }
      });
  });
</script>
@stop
