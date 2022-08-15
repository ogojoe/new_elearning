@extends('adminlte::page')

@section('title', 'Alumnos')

@section('content_header')
    <h1>Alumnos en escuela {{$school->name}}</h1>
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
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->user->email}}</td>
                        <td><a class="btn btn-primary" href="{{route('admin.school.students.show',['school' => $school,'student'=>$student])}}">Revisar</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $students->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop