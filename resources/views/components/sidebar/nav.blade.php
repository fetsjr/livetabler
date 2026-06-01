{{-- Lista de navegación vertical de Tabler. La clase REAL es 'navbar-nav'
     (NO 'nav flex-column gap-1', que es Tailwind/Bootstrap horizontal).
     Fusiona las clases del consumidor en el ul raíz. --}}
<ul {{ $attributes->class(['navbar-nav']) }}>
    {{ $slot }}
</ul>
