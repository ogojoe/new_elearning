@extends('adminlte::page')

@section('title', 'Pendientes de aprobación')

@section('content_header')
    <h1>Cursos pendientes de aprobación</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Idioma</th>
                        <th>Nivel</th>
                        <th>Estatus</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->title}}</td>
                            <td>{{$course->category->name}}</td>
                            <td>{{$course->level->name}}</td>
                            <td>
                                @switch($course->status)
                                    @case(1)
                                    <small class="badge badge-danger">Borrador</small>
                                        @break
                                    @case(2)
                                    <small class="badge badge-warning">Revision</small>
                                        @break
                                    @case(3)
                                    <small class="badge badge-success">Publicado</small>
                                    @break
                                @default
                            @endswitch
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{route('admin.courses.show',$course)}}">Revisar</a>
                                <button class="btn btn-danger" onclick="elimina({{$course}});">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $courses->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        function elimina(course){
            Swal.fire({
            title: '¿Estas seguro de eliminar este curso?',
            showDenyButton: true,
            confirmButtonColor: '#008000',
            confirmButtonText: 'Eliminar',
            denyButtonText: `Cancelar`,
            }).then((result) => {
            if (result.isConfirmed) {
                
            } else if (result.isDenied) {
                Swal.fire('El curso no se eliminó', '', 'info')
            }
            })
        }
    </script>

@stop
