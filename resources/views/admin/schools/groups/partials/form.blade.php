<div class="mb-2">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el nombre del grupo']) !!}

    @error('name')
        <span class="text-red text-sm">{{$message}}</span>
    @enderror
</div>

<div class="mb-2">
    {!! Form::label('year', 'Año:') !!}
    {!! Form::text('year', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el año del curso (ex:2022)']) !!}

    @error('year')
        <span class="text-red text-sm">{{$message}}</span>
    @enderror
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('category_id', 'Idioma: ') !!}
        {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('level_id', 'Nivel: ') !!}
        {!! Form::select('level_id', $levels, null, ['class'=>'form-control']) !!} 
    </div>
  </div>
