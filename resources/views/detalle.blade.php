@include('componentes.header')

    <h1>Bebida {{ $bebida -> id }}</h1>  
    <a href="/">Volver</a> <br><br>

    <strong>Nombre:</strong> {{ $bebida->nombre }} <br>
    <strong>Capacidad:</strong> {{ $bebida->capacidad }} <br>
    <strong>Stock:</strong> {{ $bebida->stock }} <br>
    <strong>Tipo:</strong> {{ $bebida->tipo }} <br>
    <strong>Marca:</strong> {{ $bebida->marca }} <br>
    <strong>Fecha de Creación:</strong> {{ $bebida->created_at }} <br>
    <strong>Fecha de Actualización:</strong> {{ $bebida->updated_at }} <br>

@include('componentes.footer')