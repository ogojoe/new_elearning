@extends('adminlte::page')

@section('title', 'Mis grupos')

@section('content_header')
    <h1>Grupos de docente {{$teacher->name}}</h1>
@stop

@section('content')
<div class="row">
    @forelse ($teacher->groups as $group)
        <x-group-card :group="$group"/>
    @empty
        <p>No hay grupos para mostrar</p>
    @endforelse
</div>
    
@stop

@section('css')
    
@stop

@section('js')
    
@stop