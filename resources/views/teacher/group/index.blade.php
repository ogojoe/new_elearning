@extends('adminlte::page')

@section('title', 'Docente')

@section('content_header')
    @if ($group->studentsGroup->count() > 0)
        <a class="btn btn-secondary btn-sm float-right" href="#">Revisar Calificaciones</a>
    @endif
    <h1>Grupo {{$group->name}}</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>
@endif

<div class="p-3">
    <div class="overflow-x-auto">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>E-mail</th>
                    <th>Promedio</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>    
                @forelse ($group->studentsGroup as $key => $student)
                    <tr>
                        <td>
                            {{$key+1}}
                        </td>
                        <td>
                            {{$student->name}}
                        </td>
                        <td>
                            {{$student->user->email}}
                        </td>
                        <td>
                            5
                        </td>
                        <td width="10px">
                            <button type="button" class="btn btn-primary btn-sm modalStudent" data-id="{{$student->id}}" data-toggle="modal" data-target="#modal-default">
                                Asignar exámen
                            </button>
                        </td>
                    </tr>
                @empty
                <h3>No hay alumnos para mostrar</h3>

                @endforelse
            </tbody>
            
        </table>
        
    </div>
</div>


<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Asignar exámen</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'teacher.student.assginEvaluation']) !!}
                <input name="student_id" id="student_id" type="hidden">
                <div class="form-group">
                    <label class="w-32">Exámen:</label>
                        <select class="form-control" name="evaluation_id">
                            @forelse ($evaluations as $evaluation)
                                <option value="{{$evaluation->id}}">{{$evaluation->name}}</option>                                    
                                @empty
                                <option>Aun no hay examenes...</option>
                            @endforelse
                        </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                {!! Form::submit('Guardar', ['class'=>'btn btn-primary mt-2']) !!}
                {{-- <button type="button" class="btn btn-primary">Guardar</button> --}}
            </div>
            {!! Form::close() !!}
        </div>

    </div>

</div>


@stop

@section('css')
    
@stop

@push('js')
    <script>
        $(".modalStudent").on('click', function() {

            $("#student_id").val($(this).data('id'));
            
        });

        
    </script>  
@endpush('js')
