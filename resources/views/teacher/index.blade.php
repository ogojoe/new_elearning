@extends('adminlte::page')

@section('title', 'Docente')

@section('content_header')
    <h1>Grupos del docente</h1>
@stop

@section('content')
<div class="row">
    @foreach ($groups as $group)
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$group->name}}</h3>
                    <p>{{$group->periodo}}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('teacher.group',$group)}}" class="small-box-footer">+ info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    @endforeach
</div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop