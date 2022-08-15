@extends('adminlte::page')

@section('title', 'Docentes')

@section('content_header')
    <h1>Docentes en escuela {{$school->name}}</h1>
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
                    @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{$teacher->id}}</td>
                        <td>{{$teacher->name}}</td>
                        <td>{{$teacher->user->email}}</td>
                        <td><a class="btn btn-primary" href="{{route('admin.school.teachers.show',['school' => $school, 'teacher' => $teacher])}}">Grupos</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $teachers->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop