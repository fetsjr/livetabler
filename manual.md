# Manual de Desarrollo: LiveTabler UI

Este manual describe el proceso de creación y la arquitectura de la librería **LiveTabler**, una alternativa a Flux UI basada en los componentes y estilos de **Tabler UI** para Laravel Blade.

## 1. Objetivo del Proyecto
Replicar la API de componentes de **Flux UI** (`<tabler:...>`) utilizando el motor de estilos de **Tabler UI** (Bootstrap 5) y la interactividad de **Alpine.js**, eliminando la dependencia forzosa de Tailwind CSS y Livewire Pro.

---

## 2. Estructura de Carpetas

- **`src/`**: Contiene el código lógico de la librería.
  - `TablerServiceProvider.php`: El motor que registra los componentes y vistas en Laravel.
  - `helpers.php`: Funciones de utilidad para clases dinámicas.
- **`stubs/resources/views/tabler/`**: El catálogo de componentes Blade.
  - Cada componente (ej. `accordion`) tiene su carpeta con un `index.blade.php` y sus sub-componentes (`item.blade.php`, `heading.blade.php`, etc.).

---

## 3. Registro de Componentes (La Magia)

Para que Laravel reconozca la etiqueta `<tabler:componente>` sin el prefijo `x-`, el `TablerServiceProvider` realiza las siguientes acciones:

1. **`loadViewsFrom`**: Registra el namespace `tabler::` para acceder a los archivos.
2. **`anonymousComponentPath`**: Registra la carpeta de componentes anónimos.
3. **`registerAliases`**: Mapea manualmente cada etiqueta a su archivo Blade para asegurar que el motor de Blade lo procese correctamente.

---

## 4. Estándares de Diseño (Modernización 1.x)

### 4.1. Sintaxis de Llamada
Los componentes deben seguir la estructura de sub-componentes de Flux:
```blade
<tabler:accordion>
    <tabler:accordion.item name="id">
        <tabler:accordion.heading>Título</tabler:accordion.heading>
        <tabler:accordion.content>Contenido</tabler:accordion.content>
    </tabler:accordion.item>
</tabler:accordion>
```

### 4.2. Clases Nativas (Bootstrap 5 / Tabler)
Se ha completado la migración de clases de Tailwind CSS a clases nativas de **Tabler** para asegurar la compatibilidad total con el ecosistema de Dashboards:
- **Botones**: `.btn`, `.btn-primary`, `.btn-icon`, `.btn-loading`.
- **Formularios**: `.form-control`, `.form-select`, `.input-icon`, `.is-invalid`.
- **Navegación**: `.navbar-vertical`, `.nav-link`, `.nav-item`, `.dropdown-menu`.
- **Tablas**: `.table`, `.card-table`, `.table-sort`, `.th`, `.td`.
- **Feedback**: `.toast`, `.badge`, `.skeleton`, `.skeleton-pulse`.
- **Layout**: `.card`, `.card-header`, `.card-body`, `.d-flex`, `.gap-2`.

### 4.3. Interactividad
Se utiliza **Alpine.js** para toda la lógica de estado (abrir, cerrar, toggle, etc.) para mantener la librería ligera. El diseño visual se delega al 100% en el CSS de Tabler.

---

## 5. Instalación para Pruebas (Entorno Sail)

Para trabajar localmente y ver cambios instantáneos sin subir a GitHub:

1. Añadir el repositorio en el `composer.json` del proyecto de pruebas:
   ```json
   "repositories": [
       {
           "type": "path",
           "url": "../tabler-main",
           "options": { "symlink": true }
       }
   ]
   ```
2. Ejecutar `./vendor/bin/sail composer require fetsjr/livetabler:@dev`.
3. Limpiar caché: `./vendor/bin/sail artisan view:clear`.

---

## 6. Próximos Pasos (Hoja de Ruta)
1. **Auditoría Visual**: Verificar que la transición a clases nativas no haya roto el layout en dispositivos móviles (responsividad).
2. **Componentes Complejos**: Refactorizar `autocomplete`, `date-picker` y `kanban` para usar el motor de búsqueda nativo de Tabler.
3. **Documentación Pro**: Generar ejemplos interactivos para cada componente en un entorno de prueba visible.
4. **Icons**: Centralizar y optimizar la carga de Tabler Icons (SVG) mediante un componente dedicado `<tabler:icon />`.
