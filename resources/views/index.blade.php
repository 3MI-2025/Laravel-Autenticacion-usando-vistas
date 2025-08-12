<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <h1>Bebidas</h1>

        <form action="/bebida" method="POST">
            @csrf
            Nombre <input type="text" name="nombre"> <br>
            Capacidad <input type="number" name="capacidad"> <br>
            Stock <input type="number" name="stock"> <br>
            Tipo <input type="text" name="tipo"> <br>
            Marca <input type="text" name="marca"> <br>
            <input type="submit" value="Agregar Bebida"><br><br>
        </form>

        @if (session("bebidaAgregada"))
            <strong>Bebida agregada correctamente</strong>
        @endif

        @if (session("bebidaEliminada"))
            <strong>Bebida eliminada correctamente</strong>
        @endif

        @if (session("bebidaEditada"))
            <strong>Bebida editada correctamente</strong>
        @endif

        @foreach ($bebidas as $bebida)
            <div>
                {{ $bebida->nombre }} - {{ $bebida->stock }} <a href="/bebida/{{ $bebida->id }}">Ver Detalles</a> <a href="/eliminar/{{ $bebida->id }}">Eliminar</a> <a href="/editar/{{ $bebida->id }}">Editar</a> <br>
            </div>
        @endforeach
    </body>
</html>