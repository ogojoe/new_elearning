@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Todos los usuarios</h1>
@stop

@section('content')
    @livewire('admin.users-index', ['solicitudes' => false])
@stop

@section('css')
    
@stop

@section('js')
    
@stop