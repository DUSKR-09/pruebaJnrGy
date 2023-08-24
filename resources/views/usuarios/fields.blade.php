<!-- Usuario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usuario', 'Usuario:') !!}
    {!! Form::text('usuario', null, ['class' => 'form-control']) !!}
</div>

<!-- Primer Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('primer_nombre', 'Primer Nombre:') !!}
    {!! Form::text('primer_nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Segundo Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('segundo_nombre', 'Segundo Nombre:') !!}
    {!! Form::text('segundo_nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Primer Apellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('primer_apellido', 'Primer Apellido:') !!}
    {!! Form::text('primer_apellido', null, ['class' => 'form-control']) !!}
</div>

<!-- Segundo Apellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('segundo_apellido', 'Segundo Apellido:') !!}
    {!! Form::text('segundo_apellido', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', 'Telefono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('usuarios.index') }}" class="btn btn-default">Cancelar</a>
</div>
