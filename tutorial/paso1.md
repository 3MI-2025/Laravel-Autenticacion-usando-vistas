# Paso 1
## Crear Modelo y migraciones

En este paso vamos a:
* Crear una migración para crear la tabla de bebidas en la base de datos
* Crear un modelo para trabajar con la tabla de bebidas en Laravel.

<hr>

Empezemos...

Ejecutamos `php artisan make:model -m Bebida` en la terminal. 
Esto nos generará el archivo de modelo en `App/Models/Bebida.php`, y una migración en `database/migrations/XX_XX_XX_XXXXXX_create_bebidas_table.php` (el archivo tiene la fecha de creación en su nombre).

Editamos el archivo de la migración, y le ingresamos el siguiente contenido en la función `up`:

```php
Schema::create('bebidas', function (Blueprint $table) {
    $table->id();
    $table->string("nombre");
    $table->integer("capacidad");
    $table->integer("stock");
    $table->string("tipo");
    $table->string("marca");
    $table->softDeletes();
    $table->timestamps();
});
```

Una vez terminado, ejecutamos el comando `php artisan migrate` para que se apliquen las migraciones, y crear las tablas necearias en la base de datos.

Luego, editamos el archivo `App/Models/Bebida.php` con el siguiente contenido, para indicar que utilice la funcionalidad de baja lógica:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bebida extends Model
{
    use SoftDeletes;

}
```

Nótese que en la migración utilizamos la funcion `$table->softDeletes()`, y en el modelo utilizamos `use SoftDeletes` .
Esto nos permite realizar una baja lógica de los registros, es decir, al eliminar un registro, no se borra de la base de datos, sino que se marca como eliminado, manteninendo la integridad de los datos en la base de datos, y permitiendo que se pueda recuperar el registro eliminado en caso de ser necesario.



