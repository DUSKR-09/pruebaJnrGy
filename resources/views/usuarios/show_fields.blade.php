<!-- Usuario Field -->
<div class="form-group">
    {!! Form::label('usuario', 'Usuario:') !!}
    <p>{{ $usuario->usuario }}</p>
</div>

<!-- Primer Nombre Field -->
<div class="form-group">
    {!! Form::label('primer_nombre', 'Primer Nombre:') !!}
    <p>{{ $usuario->primer_nombre }}</p>
</div>

<!-- Segundo Nombre Field -->
<div class="form-group">
    {!! Form::label('segundo_nombre', 'Segundo Nombre:') !!}
    <p>{{ $usuario->segundo_nombre }}</p>
</div>

<!-- Primer Apellido Field -->
<div class="form-group">
    {!! Form::label('primer_apellido', 'Primer Apellido:') !!}
    <p>{{ $usuario->primer_apellido }}</p>
</div>

<!-- Segundo Apellido Field -->
<div class="form-group">
    {!! Form::label('segundo_apellido', 'Segundo Apellido:') !!}
    <p>{{ $usuario->segundo_apellido }}</p>
</div>

<!-- Telefono Field -->
<div class="form-group">
    {!! Form::label('telefono', 'Telefono:') !!}
    <p>{{ $usuario->telefono }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $usuario->email }}</p>
</div>

