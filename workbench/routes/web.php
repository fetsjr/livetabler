<?php

use Illuminate\Support\Facades\Route;

/**
 * Ruta de inicio del playground.
 * Muestra una página con ejemplos de los componentes de LiveTabler.
 */
Route::get('/', function () {
    return view('demo');
});
