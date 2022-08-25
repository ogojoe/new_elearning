@extends('adminlte::page')

@section('title', 'Asignados Exámen TOEFL')

@section('content_header')
    <h1>Asignados Exámen TOEFL</h1>
@stop

@section('content')
    @livewire('admin.toefl.users-asignated', ['toefl' => $toefl])
@endsection