@extends('adminlte::page')

@section('title', 'Alumnos')

@section('content_header')
    <h1>Alumnos pendientes de asignar escuela</h1>
@stop

@section('content')
    @livewire('admin.students-index')
@stop

@section('css')
    
@stop

@section('js')
    
@stop