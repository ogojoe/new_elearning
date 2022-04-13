@extends('adminlte::page')

@section('title', 'Crear Nivel')

@section('content_header')
    <h1>Crear Nivel</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.levels.store']) !!}
                <div>
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el nuevo nivel']) !!}
                
                    @error('name')
                        <span class="text-red text-sm">{{$message}}</span>
                    @enderror
                </div>
                {!! Form::submit('Crear nivel', ['class'=>'btn btn-primary mt-2']) !!}
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