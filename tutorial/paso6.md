# Paso 6
## Agregar edición de bebidas
En este paso vamos a:
* Agregar un enlace para editar una Bebida en la lista.
* Agregar la lógica para editar una Bebida en el controlador.
* Agregar una vista para editar una Bebida.
<hr>



En la vista `resources/views/index.blade.php`, debajo de la lista de Bebidas, agregamos un enlace para ver editar una Bebida, dentro del `foreach`:
```html
@foreach ($bebidas as $bebida)
    <div>
        {{ $bebida->nombre }} - {{ $bebida->stock }} <a href="/bebida/{{ $bebida->id }}">Ver Detalles</a> <a href="/eliminar/{{ $bebida->id }}">Eliminar</a> <a href="/editar/{{ $bebida->id }}">Editar</a><br>
    </div>
@endforeach
```

Tambien, debajo del formulario, agregamos un mensaje de éxito si se ha editado una bebida correctamente:

```php
@if (session("bebidaEditada"))
    <strong>Bebida editada correctamente</strong>
@endif
```

Luego, en el controlador `App/Http/Controllers/BebidaController.php`, agregamos la siguiente función buscar una Bebida existente, y devolver sus datos a la vista de edición:

```php
public function BuscarParaEditar(Request $request, $id){
    $bebida = Bebida::findOrFail($id);
    return view("editar", ["bebida" => $bebida]);
}
```

Ahora, creamos una nueva vista para editar la Bebida, en `resources/views/editar.blade.php`, con el siguiente contenido:

```html
<body>
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
</body>
```

Luego, en el controlador, agregamos la lógica para editar una Bebida, que se ejecutará al enviar el formulario de edición:

```php
public function Editar(Request $request){
    $bebida = Bebida::findOrFail($request->id);
    $bebida->nombre = $request->nombre;
    $bebida->capacidad = $request->capacidad;
    $bebida->stock = $request->stock;   
    $bebida->tipo = $request->tipo;
    $bebida->marca = $request->marca;
    $bebida->save();
    return redirect("/")->with("bebidaEditada", true);
}
```

Por último, agregamos las rutas necesarias en `routes/web.php` para acceder a la vista de edición y para procesar el formulario de edición:

```php
Route::get('/editar/{id}', [BebidaController::class, "BuscarParaEditar"]);
Route::post('/editar', [BebidaController::class, "Editar"]);
```


Ahora, si iniciamos el servidor local de Laravel con `php artisan serve`, y desde el navegador, en la URL `http://localhost:8000` deberiamos tener la vista cargada, y al hacer click en el enlace "Editar" de una Bebida, deberíamos ver la vista de edición con los datos de la Bebida cargados en el formulario.
Al editar los datos y enviar el formulario, deberiamos ver el mensaje de éxito "Bebida editada correctamente", y al volver a la lista de Bebidas, deberiamos ver que los datos de la Bebida se han actualizado correctamente.

En la vista de detalles de Bebida, podemos notar que el campo `updated_at` se actualiza cada vez que editamos una Bebida.
<hr>
