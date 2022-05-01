<div class="mb-2">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el nombre de la escuela']) !!}

    @error('name')
        <span class="text-red text-sm">{{$message}}</span>
    @enderror
</div>

<div class="mb-2">
    {!! Form::label('clave', 'Clave:') !!}
    {!! Form::text('clave', null, ['class'=>'form-control', 'placeholder'=>'Ingresa la clave de la escuela']) !!}

    @error('clave')
        <span class="text-red text-sm">{{$message}}</span>
    @enderror
</div>

<div class="mb-2">
    {!! Form::label('tipo', 'Tipo:') !!}
    {!! Form::text('tipo', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el tipo de escuela(Publica/Privada)']) !!}

    @error('tipo')
        <span class="text-red text-sm">{{$message}}</span>
    @enderror
</div>

<div class="mb-2">
    {!! Form::label('phone', 'Telefono:') !!}
    {!! Form::text('phone', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el número telefónico de la escuela']) !!}

    @error('phone')
        <span class="text-red text-sm">{{$message}}</span>
    @enderror
</div>

<div class="mb-2">
    {!! Form::label('email', 'E-mail') !!}
    {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el correo electrónico de la escuela']) !!}

    @error('email')
        <span class="text-red text-sm">{{$message}}</span>
    @enderror
</div>

<div class="mb-2">
    {!! Form::label('country', 'Pais') !!}
    {!! Form::text('country', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el pais de la escuela']) !!}

    @error('country')
        <span class="text-red text-sm">{{$message}}</span>
    @enderror
</div>

<div class="mb-2">
    {!! Form::label('state', 'Estado') !!}
    {!! Form::text('state', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el estado de la escuela']) !!}

    @error('state')
        <span class="text-red text-sm">{{$message}}</span>
    @enderror
</div>

<div class="mb-2">
    {!! Form::label('address', 'Domicilio') !!}
    {!! Form::text('address', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el domicilio de la escuela']) !!}

    @error('address')
        <span class="text-red text-sm">{{$message}}</span>
    @enderror
</div>