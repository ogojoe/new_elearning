@extends('adminlte::page')

@section('title', 'Editar idioma')

@section('content_header')
    <h1>Editar idioma</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success ">
        {{session('info')}}
    </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($category, ['route' => ['admin.categories.update', $category ], 'method'=> 'PUT']) !!}
            <div>
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el nombre del idioma']) !!}
            
                @error('name')
                    <span class="text-red text-sm">{{$message}}</span>
                @enderror
            </div>
            {!! Form::submit('Actualizar idioma', ['class'=>'btn btn-primary mt-2']) !!}
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