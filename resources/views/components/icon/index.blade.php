@props([
    // Nombre del icono Tabler (webfont), SIN el prefijo "ti-". Ej: name="home".
    'name' => 'help',

    // Tamaño del icono en píxeles (se aplica como font-size).
    'size' => 18,
])

{{-- Icono de la fuente Tabler Icons. Fusiona las clases y estilos del consumidor
     en un único atributo, sin duplicar class. --}}
<i {{ $attributes->class(['icon', 'ti', 'ti-'.$name])->merge(['style' => 'font-size:'.$size.'px']) }}></i>
