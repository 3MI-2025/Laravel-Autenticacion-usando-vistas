@include('componentes.header')

    <h1>Editar {{ $bebida -> id }}</h1>  
    <a href="/">Volver</a> <br><br>

    <form action="/editar" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $bebida->id }}">
        Nombre <input type="text" name="nombre" value="{{ $bebida->nombre }}"> <br>
        Capacidad <input type="number" name="capacidad" value="{{ $bebida->capacidad }}"> <br>
        Stock <input type="number" name="stock" value="{{ $bebida->stock }}"> <br>
        Tipo <input type="text" name="tipo" value="{{ $bebida->tipo }}"> <br>
        Marca <input type="text" name="marca" value="{{ $bebida->marca }}"> <br>
        <input type="submit" value="Editar Bebida"><br><br>
    </form>

@include('componentes.footer')