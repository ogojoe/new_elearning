@extends('adminlte::page')

@section('title', 'Crear Escuela')

@section('content_header')
    <h1>Crear Escuela</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.schools.store']) !!}
            <div>
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el nombre de la escuela']) !!}
            
                @error('name')
                    <span class="text-red text-sm">{{$message}}</span>
                @enderror
            </div>

            <div>
                {!! Form::label('email', 'E-mail') !!}
                {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el correo electrónico de la escuela']) !!}
            
                @error('email')
                    <span class="text-red text-sm">{{$message}}</span>
                @enderror
            </div>

            <div>
                {!! Form::label('country', 'Pais') !!}
                {!! Form::text('country', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el pais de la escuela']) !!}
            
                @error('country')
                    <span class="text-red text-sm">{{$message}}</span>
                @enderror
            </div>

            <div>
                {!! Form::label('state', 'Estado') !!}
                {!! Form::text('state', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el estado de la escuela']) !!}
            
                @error('state')
                    <span class="text-red text-sm">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-2">
                {!! Form::label('address', 'Domicilio') !!}
                {!! Form::text('address', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el domicilio de la escuela']) !!}
            
                @error('address')
                    <span class="text-red text-sm">{{$message}}</span>
                @enderror
            </div>

                {!! Form::submit('Crear escuela', ['class'=>'btn btn-primary mt-2']) !!}
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