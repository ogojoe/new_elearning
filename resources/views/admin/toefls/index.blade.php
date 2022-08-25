@extends('adminlte::page')

@section('title', 'TOEFL')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.toefls.create')}}">Nuevo toefl</a>
    <h1>Lista de Examenes TOEFL</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success ">
        {{session('info')}}
    </div>
@endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th colspan="4"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($toefls as $toefl)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                {{$toefl->name}}
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.toefls.show', $toefl) }}">Asignados</a>
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.toefl.quizz', $toefl) }}">Quizz</a>
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.toefls.edit',$toefl)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.toefls.destroy',$toefl)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop