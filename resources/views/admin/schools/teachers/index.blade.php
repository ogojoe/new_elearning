@extends('adminlte::page')

@section('title', 'Dcoentes')

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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{$teacher->id}}</td>
                        <td>{{$teacher->name}}</td>
                        <td><a class="btn btn-primary" href="#">Revisar</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $teachers->links() }}
        </div>
    </div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop