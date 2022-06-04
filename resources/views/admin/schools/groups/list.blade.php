@extends('adminlte::page')

@section('title', 'Grupos')

@section('content_header')
    <h1>Grupos en {{ $school->name }} </h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-primary" role="alert">
            <strong>Well done!</strong> {{ session('info') }}
        </div>
    @endif


    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <a class="btn btn-primary" href="{{ route('admin.school.group.create', $school) }}">Crear grupo</a>
        </div>

        <div class="card-body container">
            <div class="row">
                @forelse ($groups as $item)
                    @livewire('admin.school.groups', ['group' => $item,'school'=>$school], key('groups-'.$item->id))
                @empty
                    <h3>No hay grupos para mostrar</h3>
                @endforelse
            </div>
        </div>
    </div>



   
@stop

@section('css')

@stop

@section('js')

@stop
