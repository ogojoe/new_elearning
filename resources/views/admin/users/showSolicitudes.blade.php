@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios pendientes de asignar Rol</h1>
@stop

@section('content')
    @livewire('admin.users-index', ['solicitudes' => true])
@stop

@section('css')
    
@stop

@section('js')
    
@stop