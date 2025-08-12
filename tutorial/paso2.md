# Paso 2
## Crear controlador de Bebidas, y una vista para listar todas las bebidas

En este paso vamos a:
* Crear un controlador para manejar las peticiones de Bebidas, y la funcionalidad de listar las bebidas.
* Crear una vista para listar todas las bebidas
* Configurar las rutas para que se pueda acceder a la vista desde el navegador.
* Listar las bebidas en la vista.

<hr>

En la terminal, ejecutamos `php artisan make:controller BebidaController`, para crear el archivo `App/Http/Controllers/BebidaController.php`. En este archivo definiremos la lógica de funcionamiento del proyecto relativa a las bebidas.

Dentro del archivo `App/Http/Controllers/BebidaController.php`, agregamos la referencia al modelo de bebidas, y dentro de la clase del controlador, agregamos la siguiente función para que se traigan todas las intancias del modelo de la tabla, y luego la retornemos a una vista:

```php 
use App\Models\Bebida;

class BebidaController extends Controller
{

    public function Index(){
        $bebidas = Bebida::all();
        return view("index", ["bebidas" => $bebidas]);
    }
   
}
```

Luego, creamos la vista `resources/views/index.blade.php` (las vistas se crean manualmente, no por comandos), y dentro de su contenido, le damos el codigo necesario de HTML para que se muestre correctamente en el navegador, ademas de una sentencia `foreach` con sintaxis de Blade para mostrar todas las instancias del Modelo `Bebidas` que el controlador le pasa a la vista:

```html
<body>
    <h1>Bebidas</h1>

    @foreach ($bebidas as $bebida)
        <div>
            {{ $bebida->nombre }} - {{ $bebida->stock }} <br>
        </div>
    @endforeach
</body>
```

Por ultimo, enrutamos los requests del usuario para que invoquen la ejecución de la funcion del controlador.

Para esto, editamos el archivo `routes/web.php`, con el siguiente contenido
```php 
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BebidaController;

Route::get('/',[BebidaController::class, "Index"] );
```

De esta forma, iniciamos el servidor local de Laravel con `php artisan serve`, y desde el navegador, en la URL `http://localhost:8000` deberiamos tener la vista cargada. No va a mostrar nada en la lista, ya que no creamos nada en la base de datos aún, asi que procedemos al siguiente paso.
