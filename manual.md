# Manual de Desarrollo: LiveTabler UI

Este manual describe el proceso de creación y la arquitectura de la librería **LiveTabler**, una alternativa a Flux UI basada en los componentes y estilos de **Tabler UI** para Laravel Blade.

## 1. Objetivo del Proyecto
Replicar la API de componentes de **Flux UI** (`<tabler:...>`) utilizando el motor de estilos de **Tabler UI** (Bootstrap 5) y la interactividad de **Alpine.js**, eliminando la dependencia forzosa de Tailwind CSS y Livewire Pro.

## Layout Architecture

The library follows the official Tabler UI (Bootstrap 5) layout anatomy. All pages must adhere to this structure to ensure visual consistency and correct integration of components like Sidebar and Modals.

### Page Anatomy
```html
<div class="page">
    <!-- 1. Navigation (Header / Horizontal Menu) -->
    <header class="navbar navbar-expand-md ...">...</header>
    
    <div class="page-wrapper">
        <!-- 2. Page Header (Titles & Breadcrumbs) -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <h1 class="page-title">Page Title</h1>
            </div>
        </div>

        <!-- 3. Page Body (Main Content) -->
        <main id="content" class="page-body">
            <div class="container-xl">
                <!-- Content goes here -->
            </div>
        </main>

        <!-- 4. Footer -->
        <footer class="footer">...</footer>
    </div>
</div>
```

## Component Standards
- **Classes**: Always use native Tabler classes (e.g., `.btn`, `.form-control`, `.card`).
- **Icons**: Use SVG icons from `@tabler/icons`.
- **Assets**: Assets are managed automatically via `@tablerStyles` and `@tablerScripts`.

---

## 2. Estructura de Carpetas

- **`src/`**: Contiene el código lógico de la librería.
  - `TablerServiceProvider.php`: Registra componentes, vistas, directivas y publicación de activos.
  - `TablerTagCompiler.php`: Compilador para etiquetas `<tabler:...>`.
- **`resources/`**: Activos estáticos de Tabler UI (CSS/JS).
- **`stubs/resources/views/tabler/`**: El catálogo de componentes Blade.

---

## 3. Registro y Activos (La Magia)

Para que la librería funcione de forma autónoma, el `TablerServiceProvider` gestiona:

1. **Vistas y Componentes**: Registra el namespace `tabler::` y la ruta de componentes anónimos.
2. **Directivas de Activos**: 
   - `@tablerStyles`: Carga el CSS de Tabler desde `public/vendor/tabler`.
   - `@tablerScripts`: Carga el JS de Tabler.
3. **Publicación**: Permite publicar los activos usando `php artisan vendor:publish --tag=tabler-assets`.
4. **Tag Compiler**: Mapea etiquetas `<tabler:...>` a los componentes Blade correspondientes.

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

### Horizontal Layout (Condensed)
Focuses on a clean header and sub-navigation. Used in the `activity.html` preview.

```html
<div class="page">
    <header class="navbar navbar-expand-md ...">...</header>
    <div class="navbar-expand-md">
        <div class="navbar">...</div>
    </div>
    <div class="page-wrapper">
        <main class="page-body">...</main>
    </div>
</div>
```

### Vertical Layout (Sidebar)
Used when the navigation is on the left side.

```html
<div class="page">
    <aside class="navbar navbar-vertical ...">...</aside>
    <div class="page-wrapper">
        <header class="navbar navbar-expand-md ...">...</header>
        <main class="page-body">...</main>
    </div>
</div>
```

3. **Documentación Pro**: Generar ejemplos interactivos para cada componente en un entorno de prueba visible.
4. **Icons**: Centralizar y optimizar la carga de Tabler Icons (SVG) mediante un componente dedicado `<tabler:icon />`.
