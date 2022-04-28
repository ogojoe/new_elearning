@extends('adminlte::page')

@section('title', 'Editar usuario')

@section('content_header')
    <h1>Editar usuario</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success ">
        {{session('info')}}
    </div>
@endif
    <div class="card">
        <div class="card-body">
            <h1 class="h5">Nombre</h1>
            <p class="form-control">{{$user->name}}</p>

            <h1 class="h5">Indica el rol del usuario</h1>
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
                @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1','onchange'=>'showEscuelas(this.value)']) !!}
                        {{$role->name}}
                    </label>
                </div>
                @endforeach
                
                {!! Form::submit('Asignar rol', ['class'=> 'btn btn-primary mt-2']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('plugins.Select2', true)

@section('css')
    
@stop

@section('js')
    <script src="{{ asset('js/myscripts.js')}}"></script>
    <script>
        function showEscuelas(value){
            resetSelect("roles[]",value);
        }

    </script>
@stop