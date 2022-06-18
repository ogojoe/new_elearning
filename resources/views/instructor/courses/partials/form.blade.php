<div class="mb-4">
    {!! Form::label('title', 'Titulo del curso') !!}
    {!! Form::text('title', null, ['class' => 'form-input block w-full mt-1'.($errors->has('title')?' border-red-600':'')]) !!}
    @error('title')
        <strong class="test-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4 hidden">
    {!! Form::label('slug', 'Slug del curso',['class' => '']) !!}
    {!! Form::hidden('slug', null, ['readonly'=>'readonly','class' => ' form-input block w-full mt-1'.($errors->has('slug')?' border-red-600':'')]) !!}
    @error('slug')
        <strong class="test-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('subtitle', 'Subtitulo del curso') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-input block w-full mt-1'.($errors->has('subtitle')?' border-red-600':'')]) !!}
    @error('subtitle')
        <strong class="test-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('description', 'Descripción del curso') !!}
    {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1'.($errors->has('description')?' border-red-600':'')]) !!}
    @error('description')
        <strong class="test-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="grid grid-cols-3 gap-4">
    <div>
        {!! Form::label('category_id', 'Idioma: ') !!}
        {!! Form::select('category_id', $categories, null, ['class'=>'form-input block w-full mt-1']) !!}
    </div>
    <div>
        {!! Form::label('level_id', 'Nivel: ') !!}
        {!! Form::select('level_id', $levels, null, ['class'=>'form-input block w-full mt-1']) !!} 
    </div>
    <div>
        {{ Form::hidden('price_id', '1') }}
        {{-- {!! Form::label('price_id', 'Precio: ') !!}
        {!! Form::select('price_id', $prices, null, ['class'=>'form-input block w-full mt-1']) !!} --}}
    </div>
</div>

<h1 class="text-2xl font-bold mt-8 mb-2">Imagen</h1>

<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($course->image)
        {{-- <img id="picture" class="w-full h-64 object-cover object-center" src="/storage/{{$course->image->url}}" alt="">
         --}}<img id="picture" class="w-full h-64 object-cover object-center" src="{{Storage::url($course->image->url)}}" alt="">
        @else
        <img id="picture" class="w-full h-64 object-cover object-center" src="/img/cursos/miroshnichenko.jpg" alt="">
        @endisset
        
    </figure>
    <div>
        <p class="mb-2">
            Ingresa una imagen referente al curso.
        </p>
        {!! Form::file('file', ['class'=>'form-input w-full'.($errors->has('file')?' border-red-600':''),'id'=>'file','accept'=>'image/*']) !!}
        @error('file')
        <strong class="test-xs text-red-600">{{$message}}</strong>
        @enderror

    </div>
</div>