{{-- Separador (linea divisoria) entre grupos de items del menu.
     Fusiona las clases del consumidor una sola vez. --}}
<div {{ $attributes->class(['dropdown-divider'])->merge(['role' => 'separator']) }}></div>
