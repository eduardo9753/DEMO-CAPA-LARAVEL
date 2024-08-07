<div class="mb-4">
    <div class="row">
        <div class="col-md-12">
            {{-- PRIMER PARAMETRO : son los campos del modelo mejor dicho de la tabla --}}
            {!! Form::label('title', 'titulo del curso') !!}
            {!! Form::text('title', null, ['class' => 'form-control block']) !!}

            @error('title')
                <span class="text-danger"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>

</div>

<div class="mb-4">
    {{-- PRIMER PARAMETRO : son los campos del modelo mejor dicho de la tabla --}}
    {!! Form::label('subtitle', 'Subtitulo del curso') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-control block']) !!}

    @error('subtitle')
        <span class="text-danger"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="mb-4">
    {{-- PRIMER PARAMETRO : son los campos del modelo mejor dicho de la tabla --}}
    {!! Form::label('description', 'Description del curso') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control block bg-dark text-dark']) !!}

    @error('description')
        <span class="text-danger"><strong>{{ $message }}</strong></span>
    @enderror
</div>
