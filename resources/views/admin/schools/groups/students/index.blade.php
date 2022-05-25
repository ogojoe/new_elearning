@extends('adminlte::page')

@section('title', 'Alumnos')

@section('content_header')
    <h1>Alumnos del grupo {{$group->name}}</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success ">
    {{session('info')}}
</div>
@endif
<div class="card">
    <div class="card-header text-right">
        <a href="{{route('admin.school.group.alumnos.create',['school' => $school, 'group' => $group])}}" class="btn btn-primary">Asignar alumnos</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>E-mail(user)</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($group->studentsGroup as $student)
                    <tr>
                        <td>
                            {{$student->id}}
                        </td>
                        <td>
                            {{$student->name}}
                        </td>
                        <td>
                            {{$student->user->email}}
                        </td>
                        <td width="10px">
                            {{-- <a class="btn btn-primary btn-sm" href="{{route('admin.categories.edit',$category)}}">Editar</a> --}}
                        </td>
                        <td width="10px">
                            {{-- <form action="{{route('admin.categories.destroy',$category)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                            </form> --}}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Aun no hay alumnos en este curso...</td> 
                    </tr>
                @endforelse
            </tbody>
            
        </table>
    </div>
</div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop