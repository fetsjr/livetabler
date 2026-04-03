# LiveTabler Component Library - Complete Guide

Esta guía contiene la documentación técnica de todos los componentes modernizados de **LiveTabler**, diseñados para ser 100% compatibles con **Tabler UI / Bootstrap 5**.

## 1. Sistema de Layout Maestro
El núcleo estructural de la aplicación.
- `<tabler:layout type="...">`: Soporta `vertical`, `horizontal`, `combo`, `boxed`, `fluid`, `condensed`, `overlap`.
- `<tabler:navbar>`: Barra superior inteligente con soporte `sticky` y `overlap`.
- `<tabler:sidebar>`: Menú lateral con soporte para temas `dark`/`light`.
- `<tabler:page-header>`: Título, subtítulo y botones de acción.
- `<tabler:page-body>`: Contenedor principal de contenido.

## 2. Componentes de Navegación y Estructura
- `<tabler:breadcrumb>` & `<tabler:breadcrumb-item>`: Navegación de ruta.
- `<tabler:steps>` & `<tabler:step-item>`: Indicadores de proceso/vistas.
- `<tabler:accordion>` & `<tabler:accordion-item>`: Colapsables de contenido.
- `<tabler:timeline>` & `<tabler:timeline-item>`: Listado de eventos cronológicos.

## 3. Formit (Formularios y Captura)
- `<tabler:input>`: Campos de texto estándar con soporte de iconos y validación.
- `<tabler:select>`: Selector inteligente (Simple, Multi-select, Searchable vía Tom Select).
- `<tabler:datepicker>`: Selector de fechas profesional con Litepicker.
- `<tabler:autocomplete>`: Búsqueda dinámica en tiempo real vía AJAX.
- `<tabler:checkbox>`: Checkboxes estilizados nativos.

## 4. UI Elements (Visualización)
- `<tabler:button>`: Botones con estados, colores y carga.
- `<tabler:icon>`: Acceso centralizado a los iconos de Tabler.
- `<tabler:badge>`: Etiquetas de estado y contadores.
- `<tabler:status>`: Puntos indicadores de estado (animados opcionalmente).
- `<tabler:avatar>`: Imágenes de perfil con tamaños y formas.
- `<tabler:progress>`: Barras de progreso con etiquetas y colores.
- `<tabler:card>`: Contonenedores con headers, footers y ribbons.
- `<tabler:alert>`: Mensajes de retroalimentación (Info, Success, Warning, Error).
- `<tabler:modal>`: Diálogos avanzados con soporte de scroll y estados.
- `<tabler:dropdown>`: Menús desplegables integrados.
- `<tabler:table>`: Tablas pre-estilizadas para dashboards.

## 5. Prácticas de Desarrollo
- **Consistencia Visual**: Usa siempre las utilidades de Bootstrap 5 (`mb-3`, `text-muted`, etc.) en combinación con estos componentes.
- **Validación**: Todos los componentes de formulario manejan automáticamente la clase `is-invalid` si existe un error en la sesión de Laravel.
- **Iconografía**: Prefiere el uso de `<tabler:icon name="..." />` para mantener la coherencia en toda la interfaz.
