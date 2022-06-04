@extends('adminlte::page')

@section('title', 'Resultados')

@section('content_header')
{{--     <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.categories.create')}}">Nuevo idioma</a> --}} 
   <h1>Resultados grupo {{$group->name}}</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success ">
        {{session('info')}}
    </div>
@endif
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th colspan="10" class="text-center">Calificaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($group->studentsGroup as $key => $student)
                        <tr>
                            <td>
                                {{$key+1}}
                            </td>
                            <td>
                                {{$student->name}}
                            </td>
                            <td><input class="form-control" type="number" name="cp"></td>
                            <td><input class="form-control" type="number" name="cp"></td>
                            <td><input class="form-control" type="number" name="cp"></td>
                            <td><input class="form-control" type="number" name="cp"></td>
                            <td><input class="form-control" type="number" name="cp"></td>
                            <td><input class="form-control" type="number" name="cp"></td>
                            <td><input class="form-control" type="number" name="cp"></td>
                            <td><input class="form-control" type="number" name="cp"></td>
                            <td><input class="form-control" type="number" name="cp"></td>
                            <td><input class="form-control" type="number" name="cp"></td>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop