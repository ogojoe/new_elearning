@extends('adminlte::page')

@section('title', 'Grupos')

@section('content_header')
    <h1>Crear grupo en {{ $school->name }} </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => ['admin.school.group.store', 'school'=>$school]]) !!}
            @include('admin.schools.groups.partials.form')

                {!! Form::submit('Crear grupo', ['class'=>'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('css')

@stop

@section('js')

@stop
