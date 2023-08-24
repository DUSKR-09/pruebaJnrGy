<div class="table-responsive">
    <table class="table" id="usuarios-table">
        <thead>
            <tr>
                <th>Usuario</th>
        <th>Primer Nombre</th>
        <th>Segundo Nombre</th>
        <th>Primer Apellido</th>
        <th>Segundo Apellido</th>
        <th>Telefono</th>
        <th>Email</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->usuario }}</td>
            <td>{{ $usuario->primer_nombre }}</td>
            <td>{{ $usuario->segundo_nombre }}</td>
            <td>{{ $usuario->primer_apellido }}</td>
            <td>{{ $usuario->segundo_apellido }}</td>
            <td>{{ $usuario->telefono }}</td>
            <td>{{ $usuario->email }}</td>
                <td>
                    {!! Form::open(['route' => ['usuarios.destroy', $usuario->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('usuarios.show', [$usuario->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('usuarios.edit', [$usuario->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Está seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
