# Paso 4
## Agregar vista de detalles de bebida

En este paso vamos a:
* Agregar un enlace para ver los detalles de una Bebida en la lista.
* Agregar la lógica para ver los detalles de una Bebida en el controlador.
* Agregar una vista para mostrar los detalles de una Bebida.

<hr>

En la vista `resources/views/index.blade.php`, en la lista de Bebidas, agregamos un enlace para ver los detalles de cada Bebida, dentro del `foreach`:
```html
@foreach ($bebidas as $bebida)
    <div>
        {{ $bebida->nombre }} - {{ $bebida->stock }} <a href="/bebida/{{ $bebida->id }}">Ver Detalles</a> <br>
    </div>
@endforeach
 ```
Luego, creamos la vista `resources/views/detalle.blade.php` para mostrar los detalles de una Bebida, con el siguiente contenido:

```html
<body>
    <h1>Bebida {{ $bebida -> id }}</h1>  
    <a href="/">Volver</a><br><br>

    <strong>Nombre:</strong> {{ $bebida->nombre }} <br>
    <strong>Capacidad:</strong> {{ $bebida->capacidad }} <br>
    <strong>Stock:</strong> {{ $bebida->stock }} <br>
    <strong>Tipo:</strong> {{ $bebida->tipo }} <br>
    <strong>Marca:</strong> {{ $bebida->marca }} <br>
    <strong>Fecha de Creación:</strong> {{ $bebida->created_at }} <br>
    <strong>Fecha de Actualización:</strong> {{ $bebida->updated_at }} <br>
</body>

``` 

Luego, en el controlador `App/Http/Controllers/BebidaController.php`, agregamos la siguiente función para manejar el request de ver los detalles de una Bebida:

```php
public function Detalle(Request $request, $id){
    $bebida = Bebida::findOrFail($id); 
    return view("detalle", ["bebida" => $bebida]);
}
```

Por ultimo, agregamos la ruta para que se pueda acceder a esta función desde el navegador, editando el archivo `routes/web.php`:

```php
Route::get('/bebida/{id}', [BebidaController::class, "Detalle"]);
``` 
Ahora, si iniciamos el servidor local de Laravel con `php artisan serve`, y desde el navegador, en la URL `http://localhost:8000` deberiamos tener la vista cargada, y al hacer click en el enlace "Ver Detalles" de una Bebida, deberiamos ver los detalles de esa Bebida en una nueva vista.