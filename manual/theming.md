# Theming

LiveTabler primarily uses **Tabler UI (Bootstrap 5)** for styling. Components support light and dark modes natively.

## Dark mode

Tabler's dark mode is typically toggled by adding the `theme-dark` class (or `data-bs-theme="dark"` in newer Bootstrap versions) to the `<body>` element.

```html
<body class="theme-dark">
```

### Auto-detect system preference

```html
<script>
    if (localStorage.getItem('tablerTheme') === 'dark' || (!('tablerTheme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.body.classList.add('theme-dark');
    }
</script>
```

### Toggle dark mode

```blade
<tabler:button x-on:click="
    document.body.classList.toggle('theme-dark');
    localStorage.setItem('tablerTheme', document.body.classList.contains('theme-dark') ? 'dark' : 'light');
">
    Toggle Dark Mode
</tabler:button>
```

## Color system

LiveTabler leverages Tabler's extensive color system. Many components accept a `color` prop that maps to semantic or specific brand colors.

### Semantic Colors
`primary`, `secondary`, `success`, `info`, `warning`, `danger`, `light`, `dark`

### Brand Colors
`blue`, `azure`, `indigo`, `purple`, `pink`, `red`, `orange`, `yellow`, `lime`, `green`, `teal`, `cyan`

```blade
<tabler:badge color="azure">Azure Alert</tabler:badge>
<tabler:button color="red">Danger Action</tabler:button>
```

## Customizing with Utilities

While components are pre-styled, you can customize them using **Bootstrap 5 utility classes**. Tailwind CSS classes are also supported if installed in your project.

### Bootstrap Utilities (Recommended)
```blade
<tabler:button class="mt-4 shadow-sm">
    Spaced Button
</tabler:button>

<tabler:card class="border-primary border-2">
    Primary Bordered Card
</tabler:card>
```

### Tailwind Integration
If your project uses Tailwind, classes are merged seamlessly using Laravel's `$attributes->class()` method.

## CSS variables

LiveTabler components use standard Tabler/Bootstrap CSS variables for dynamic styling (e.g., `--tblr-primary`, `--tblr-bg-surface`).
