@extends('adminlte::page')

@section('title', 'Grupos')

@section('content_header')
    <h1>Crear grupo en {{ $school->name }} </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($group,['route' => ['admin.school.group.update',['school'=>$school, 'group'=>$group]],'method'=> 'PUT']) !!}
            @include('admin.schools.groups.partials.form')

                {!! Form::submit('Actualizar grupo', ['class'=>'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}

            <blockquote>
                <p>Curso: {{ Str::limit($group->course->title,25)}} </p>
                <small>{{ Str::limit($group->course->subtitle,15)}} en <cite title="Source Title">{{$group->course->slug}}</cite></small>
            </blockquote>
        </div>
    </div>

@stop

@section('css')

@stop

@section('js')

@stop
