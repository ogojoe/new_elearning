@extends('adminlte::page')

@section('title', 'Editar escuela')

@section('content_header')
    <h1>Editar escuela</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success ">
        {{session('info')}}
    </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($school, ['route' => ['admin.schools.update', $school ], 'method'=> 'PUT']) !!}
        @include('admin.schools.partials.form')

            {!! Form::submit('Actualizar escuela', ['class'=>'btn btn-primary mt-2']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')

@stop

@section('js')
    
@stop