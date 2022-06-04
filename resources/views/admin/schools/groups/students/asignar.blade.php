@extends('adminlte::page')

@section('title', 'Grupos -'.$school->name)

@section('content_header')
    <h1>Asignar alumnos al grupo {{$group->name}} </h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>['admin.school.group.alumnos.store',['school' => $school, 'group' => $group]]]) !!}
                
                @include('admin.schools.groups.students.partials.form')

                {!! Form::submit('Guardar', ['class'=> 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop