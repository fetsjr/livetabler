# Theming

LiveTabler uses Tailwind CSS for all styling. Components support light and dark modes out of the box.

## Dark mode

All components include `dark:` variants automatically. Dark mode is toggled by adding a `dark` class to the `<html>` element.

```html
<html class="dark">
```

### Auto-detect system preference

```html
<script>
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    }
</script>
```

### Toggle dark mode

```blade
<tabler:button x-on:click="
    document.documentElement.classList.toggle('dark');
    localStorage.theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
">
    Toggle Dark Mode
</tabler:button>
```

## Accent color

Use `<tabler:accent>` to set a CSS `--color-accent` variable scoped to its children:

```blade
<tabler:accent color="blue">
    {{-- All children will use blue as accent color --}}
    <tabler:button>Blue accent button</tabler:button>
</tabler:accent>
```

## Color palette

Components that accept a `color` prop support these values:

### Buttons
`blue` (default), `red`, `default` (zinc)

### Badges
`blue`, `azure`, `red`, `green`, `yellow`, `gray`

### Avatars
`auto`, `red`, `orange`, `yellow`, `lime`, `green`, `teal`, `cyan`, `blue`, `purple`, `pink`

The `auto` color generates a consistent color based on the user's name hash.

## Customizing with Tailwind

All components accept standard Tailwind classes via the `class` attribute:

```blade
<tabler:button class="bg-indigo-600 hover:bg-indigo-700">
    Custom color
</tabler:button>

<tabler:card class="border-2 border-blue-500">
    Custom border
</tabler:card>
```

Classes are merged using Laravel's `$attributes->class()` method, so they properly cascade with component defaults.

## CSS variables

Some components use CSS variables for dynamic styling:

| Variable | Used by | Purpose |
|---|---|---|
| `--color-accent` | `accent.blade.php` | Accent color for children |
| `--progress-value` | `progress.blade.php` | Progress bar width |
