@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar rol</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($role, ['route'=>['admin.roles.update',$role],'method'=>'PUT']) !!}
            
            @include('admin.roles.partials.form')

            {!! Form::submit('Guardar', ['class'=> 'btn btn-primary mt-2']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop