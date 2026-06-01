{{-- Separador entre grupos de items del menu. Clase nativa de Tabler: dropdown-divider.
     La raiz fusiona la clase base con las clases del consumidor en un unico atributo class. --}}
<div {{ $attributes->class(['dropdown-divider'])->merge(['role' => 'separator']) }}></div>
