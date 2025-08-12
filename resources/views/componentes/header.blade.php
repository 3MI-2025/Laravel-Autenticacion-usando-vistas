<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <h1>Bebidas</h1>

        <ul>
            <li><a href="/">Inicio</a> </li>

            @if( Auth::user() )
                <li> Bienvenido {{ auth()->user()->name }} <a href="/logout">Logout</a> </li>
            @endif
           
        </ul>
        <br>