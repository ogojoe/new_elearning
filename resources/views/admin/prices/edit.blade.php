@extends('adminlte::page')

@section('title', 'Editar Precio')

@section('content_header')
    <h1>Editar Precio</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success ">
        {{session('info')}}
    </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($price, ['route' => ['admin.prices.update', $price ], 'method'=> 'PUT']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el Precio']) !!}
            
                @error('name')
                    <span class="text-red text-sm">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('value', 'Costo') !!}
                {!! Form::text('value', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el valor del Precio']) !!}
            
                @error('value')
                    <span class="text-red text-sm">{{$message}}</span>
                @enderror
            </div>
            {!! Form::submit('Actualizar precio', ['class'=>'btn btn-primary mt-2']) !!}
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