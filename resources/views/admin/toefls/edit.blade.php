@extends('adminlte::page')

@section('title', 'Editar Exámen TOEFL')

@section('content_header')
    <h1>Editar Exámen TOEFL</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($toefl, ['route' => ['admin.toefls.update', $toefl ], 'method'=> 'PUT']) !!}
                <div>
                    {!! Form::label('name', 'Descripción') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el nombre del examen']) !!}
                
                    @error('name')
                        <span class="text-red text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div>
                    {!! Form::label('instructions', 'Instrucciones') !!}
                    {!! Form::text('instructions', null, ['class'=>'form-control', 'placeholder'=>'Ingresa las instrucciones']) !!}
                
                    @error('instructions')
                        <span class="text-red text-sm">{{$message}}</span>
                    @enderror
                </div>
                {!! Form::submit('Actualizar información', ['class'=>'btn btn-primary mt-2']) !!}
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