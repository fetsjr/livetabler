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

## 4. Estándares de Diseño

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

### 4.2. Clases Estilizadas
Se priorizan las clases nativas de **Tabler** sobre las de Tailwind:
- Accordion: `.accordion`, `.accordion-item`, `.accordion-button`.
- Botones: `.btn`, `.btn-primary`, `.btn-lg`.
- Inputs: `.form-control`, `.form-label`.

### 4.3. Interactividad
Se utiliza **Alpine.js** para toda la lógica de estado (abrir, cerrar, toggle, etc.) para mantener la librería ligera.

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

## 6. Próximos Pasos
1. Implementar componentes **Base** (+40): Button, Badge, Alert, Breadcrumbs, etc.
2. Implementar componentes **Pro**: DatePicker (ya iniciado), Charts, Rich Text Editor.
3. Crear documentación oficial en GitHub Pages.
