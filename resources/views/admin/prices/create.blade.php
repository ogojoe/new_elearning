@extends('adminlte::page')

@section('title', 'Crear Precio')

@section('content_header')
    <h1>Crear Precio</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.prices.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el nombre del Precio']) !!}
                
                    @error('name')
                        <span class="text-red text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('value', 'Costo') !!}
                    {!! Form::number('value', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el valor del Precio']) !!}
                
                    @error('value')
                        <span class="text-red text-sm">{{$message}}</span>
                    @enderror
                </div>
                {!! Form::submit('Crear Precio', ['class'=>'btn btn-primary mt-2']) !!}
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