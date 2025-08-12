# Paso 3
## Agregar alta de bebidas, en vista y controlador

En este paso vamos a:
* Agregar un formulario para insertar Bebidas en la vista.
* Agregar la lógica para insertar Bebidas en el controlador.

<hr>

En la vista `resources/views/index.blade.php`, agregamos un formulario para insertar Bebidas luego del titlo, con el siguiente contenido:

```html
<form action="/bebida" method="POST">
    @csrf
    Nombre <input type="text" name="nombre"> <br>
    Capacidad <input type="number" name="capacidad"> <br>
    Stock <input type="number" name="stock"> <br>
    Tipo <input type="text" name="tipo"> <br>
    Marca <input type="text" name="marca"> <br>
    <input type="submit" value="Agregar Bebida"><br><br>
</form>
```
Nota: El atributo `@csrf` es necesario para que Laravel valide el formulario, y no se pueda enviar sin este token de seguridad, para evitar ataques CSRF. Debe incluirse en todos los formularios que hagamos en Laravel.

Debajo del formulario, agregamos un mensaje de éxito si se ha agregado una bebida correctamente:

```php
@if (session("bebidaAgregada"))
    <strong>Bebida agregada correctamente</strong>
@endif
```

Luego, en el controlador `App/Http/Controllers/BebidaController.php`, agregamos la siguiente función para manejar el request del formulario, y crear una nueva instancia del modelo Bebida:

```php
public function Insertar(Request $request){
    $bebida = new Bebida();
    $bebida->nombre = $request->post("nombre");
    $bebida->capacidad = $request->post("capacidad");
    $bebida->stock = $request->post("stock");
    $bebida->tipo = $request->post("tipo");
    $bebida->marca = $request->post("marca");
    $bebida->save();
    return redirect("/")->with("bebidaAgregada", true);
}
```

Por ultimo, agregamos la ruta para que se pueda acceder a esta función desde el navegador, editando el archivo `routes/web.php`:

```php
Route::post('/bebida', [BebidaController::class, "Insertar"]);
```
Ahora, si iniciamos el servidor local de Laravel con `php artisan serve`, y desde el navegador, en la URL `http://localhost:8000` deberiamos tener la vista cargada, y al completar el formulario y enviar los datos, deberiamos ver el mensaje de éxito, y la bebida debería aparecer en la lista.