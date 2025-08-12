# Ejemplo Básico Laravel

Este repositorio tiene un ejemplo básico de Laravel, realizando un CRUD de Bebidas.

## Paso a paso para crear el proyecto
Estos son los pasos de código dados para crear este proyecto desde cero (para tener una referencia de cada operacion)

* [Paso 1: Crear Modelo y Migraciones](tutorial/paso1.md)
* [Paso 2: Crear controlador de Bebidas, y una vista para listar todas las bebidas](tutorial/paso2.md)
* [Paso 3: Agregar alta de bebidas, en vista y controlador](tutorial/paso3.md)
* [Paso 4: Agregar vista de detalles de bebida](tutorial/paso4.md)
* [Paso 5: Agregar baja lógica de bebidas](tutorial/paso5.md)
* [Paso 6: Agregar edición de bebidas](tutorial/paso6.md)

Se puede leer mejor en la sección de [Wiki del repositorio](https://github.com/3MI-2025/Ejemplo-Laravel/wiki)

## Probar el proyecto (Clonado desde Github)
Para probar este proyecto, se debe clonar el repositorio de Git. Luego, se debe copiar el archivo `.env.example` en un archivo `.env` (recuerde que este archivo nunca se sube a Github, está ingorado).

Una vez copiado, configurar el bloque de configuración de base de Datos en el archivo `.env` con este contenido:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_base
DB_USERNAME=root
DB_PASSWORD=
```

Se debe indicar el nombre de la base de datos a usar, ya que tiene que existir previamente.

Luego, debemos instalar los paquetes de composer del proyecto, y crear las claves de cifrado de Laravel para el proyecto. No se interactúa con estas claves directamente, solo es necesario que existan.

Para esto, nos posicionamos en el directorio del proyecto clonado en la terminal, y ahi ejecutamos los siguientes comandos:

```bash
composer install 
php artisan key:generate 
```

Por ultimo, ejecutamos las migraciones para crear las tablas del proyecto ejecutando `php artisan migrate`

Ahora si, iniciamos el proyecto de Laravel con `php artisan serve`

<hr>

