@extends('adminlte::page')

@section('title', 'Docentes')

@section('content_header')
    <h1>Docentes pendientes de asignar escuela</h1>
@stop

@section('content')
  @livewire('admin.teachers-index')
@stop

@section('css')

@stop

@section('js')

@stop
