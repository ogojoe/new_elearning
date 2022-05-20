@extends('adminlte::page')

@section('title', 'Crear Escuela')

@section('content_header')
    <h1>Crear Escuela</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.schools.store']) !!}
            @include('admin.schools.partials.form')

                {!! Form::submit('Crear escuela', ['class'=>'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop