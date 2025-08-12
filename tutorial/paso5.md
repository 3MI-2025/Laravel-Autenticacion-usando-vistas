# Paso 5
## Agregar funcionalidad de eliminar una Bebida
En este paso vamos a:
* Agregar un enlace para eliminar una Bebida en la lista.
* Agregar la lógica para eliminar una Bebida en el controlador.
<hr>

### Nota importante

Es relevante aclarar que vamos a utilizar la funcionalidad de baja lógica de Laravel, por lo que no se eliminará la Bebida de la base de datos, sino que se marcará como eliminada. SIEMPRE se debe implementar la baja de esta forma, ya que es una buena práctica para evitar la pérdida de datos y posibles inconsistencias en la base de datos.

Esta funcionalidad ya la tenemos implementada en el modelo `Bebida` al invocar la línea `use SoftDeletes`, por lo que no es necesario modificar nada en ese archivo. También, en la migracion incluimos la funcion `$table->softDeletes();` para que se cree la columna `deleted_at` en la tabla de bebidas, que es la que se utiliza para marcar una Bebida como eliminada. 

La baja lógica funciona asignando la fecha de creación en la columna `deleted_at` de la tabla. Al momento de invocar el método `delete()` del modelo, Laravel automáticamente asigna la fecha actual a esta columna, y posteriormente la excluye automáticamente de las consultas a la base de datos.
<hr>

En la vista `resources/views/index.blade.php`, debajo de la lista de Bebidas, agregamos un enlace para ver eliminar una Bebida, dentro del `foreach`:
```html
@foreach ($bebidas as $bebida)
    <div>
        {{ $bebida->nombre }} - {{ $bebida->stock }} <a href="/bebida/{{ $bebida->id }}">Ver Detalles</a> <a href="/eliminar/{{ $bebida->id }}">Eliminar</a><br>
    </div>
@endforeach
```

Tambien, debajo del formulario, agregamos un mensaje de éxito si se ha eliminado una bebida correctamente:

```html
@if (session("bebidaEliminada"))
    <strong>Bebida eliminada correctamente</strong>
@endif

```
Luego, en el controlador `App/Http/Controllers/BebidaController.php`, agregamos la siguiente función para manejar el request de eliminar una Bebida:

```php
public function Eliminar(Request $request, $id){
    $bebida = Bebida::findOrFail($id);
    $bebida->delete();
    return redirect("/")->with("bebidaEliminada", true);
}
```

Por ultimo, agregamos la ruta para que se pueda acceder a esta función desde el navegador, editando el archivo `routes/web.php`:

```php
Route::get('/eliminar/{id}', [BebidaController::class, "Eliminar"]);
``` 

Ahora, si iniciamos el servidor local de Laravel con `php artisan serve`, y desde el navegador, en la URL `http://localhost:8000` deberiamos tener la vista cargada, y al hacer click en el enlace "Eliminar" de una Bebida, deberiamos ver el mensaje de éxito, y la Bebida debería desaparecer de la lista. 

Consultando la base de datos directamente, deberiamos ver que la columna `deleted_at` de esa Bebida tiene una fecha asignada, indicando que fue eliminada lógicamente.
<hr>
