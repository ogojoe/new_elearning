@extends('adminlte::page')

@section('title', 'Detalle escuela')

@section('content_header')
    <h1 class="center">{{$school->name}}</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success ">
        {{session('info')}}
    </div>
@endif

    <div class="row">
        <div class="col-md-4">
            <a href="{{route('admin.school.groups.list', $school )}}" class="text-dark font-weight-bold">
                <x-adminlte-info-box title="Grupos" text="{{$school->groups->count()}}" icon="fas fa-lg fa-layer-group" icon-theme="purple"/>
            </a>
        </div>
    
        <div class="col-md-4">
            <a href="{{route('admin.school.students.index', $school )}}" class="text-dark font-weight-bold">
                <x-adminlte-info-box title="Alumnos" text="{{$school->students->count()}}" icon="fas fa-lg fa-address-card" icon-theme="green"/>
            </a>
        </div>
    
        <div class="col-md-4">
            <a href="{{route('admin.school.teachers.index', $school )}}" class="text-dark font-weight-bold">
                <x-adminlte-info-box title="Docentes" text="{{$school->teachers->count()}}" icon="fas fa-lg fa-chalkboard-teacher" icon-theme="orange"/>
            </a>
        </div>

    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop