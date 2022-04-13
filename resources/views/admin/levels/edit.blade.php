@extends('adminlte::page')

@section('title', 'Editar Nivel')

@section('content_header')
    <h1>Editar Nivel</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success ">
        {{session('info')}}
    </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($level, ['route' => ['admin.levels.update', $level ], 'method'=> 'PUT']) !!}
            <div>
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el nuevo nivel']) !!}
            
                @error('name')
                    <span class="text-red text-sm">{{$message}}</span>
                @enderror
            </div>
            {!! Form::submit('Actualizar categoría', ['class'=>'btn btn-primary mt-2']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop