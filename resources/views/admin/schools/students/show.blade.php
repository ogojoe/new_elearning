@extends('adminlte::page')

@section('title', 'Alumno')

@section('content')
<div class="card mt-2">
    <div class="card-header">
        <h3 class="card-title">Información del alumno: {{strtoupper($student->name)}}</h3>
        
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Escuela</span>
                                <span class="info-box-number text-center text-muted mb-0">{{$school->name}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Grupo actual</span>
                                <span class="info-box-number text-center text-muted mb-0">
                                    @if ($group)
                                       {{$group[0]->name}}
                                    @else
                                       No tiene grupo asignado 
                                    @endif
                                    
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Curso asignado</span>
                                <span class="info-box-number text-center text-muted mb-0">
                                    @if ($courses)
                                       {{$courses[0]->title}}
                                    @else
                                       No tiene curso asignado 
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- <div class="col-12">
                        <h4>Recent Activity</h4>
                        <div class="post">
                            <div class="user-block">
                                <span class="description">Shared publicly - 7:45 PM today</span>
                            </div>

                            <p>
                                Lorem ipsum represents a long-held tradition for designers,
                                typographers and the like. Some people hate it and argue for
                                its demise, but others ignore.
                            </p>

                        </div>
                        <div class="post clearfix">
                            <div class="user-block">
                                <span class="description">Sent you a message - 3 days ago</span>
                            </div>

                            <p>
                                Lorem ipsum represents a long-held tradition for designers,
                                typographers and the like. Some people hate it and argue for
                                its demise, but others ignore.
                            </p>
                        </div>
                        <div class="post">
                            <div class="user-block">
                                <span class="description">Shared publicly - 5 days ago</span>
                            </div>

                            <p>
                                Lorem ipsum represents a long-held tradition for designers,
                                typographers and the like. Some people hate it and argue for
                                its demise, but others ignore.
                            </p>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-12 col-md-12">
                <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Datos generales</h3>
                <p class="text-muted">Información del alumno.</p>
                <br>
                <div class="text-muted">
                    <p class="text-sm">Correo electrónico
                        <b class="d-block">{{$student->user->email}}</b>
                    </p>
                    <p class="text-sm">Domicilio
                        <b class="d-block">....</b>
                    </p>
                    <p class="text-sm">Telefono
                        <b class="d-block">...</b>
                    </p>
                </div>
                <h5 class="mt-5 text-muted">Niveles cursados.</h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="" class="btn-link text-secondary">
                            <i class="far fa-fw fa-file-word"></i>
                            Niveles...</a>
                    </li>
                    
                </ul>

            </div>
        </div>
    </div>

</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop