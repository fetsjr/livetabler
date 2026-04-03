# Installation

LiveTabler is a UI component library for Laravel Livewire applications. It provides 264 Blade components styled with Tailwind CSS and powered by Alpine.js.

## Prerequisites

- **PHP** ^8.1
- **Laravel** ^10.0 | ^11.0 | ^12.0 | ^13.0
- **Livewire** ^3.7.4 | ^4.0
- **Tailwind CSS** v4+ (or v3 with configuration)
- **Alpine.js** (included with Livewire)

## Install via Composer

### From GitHub (recommended)

Add the repository to your `composer.json`:

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/fetsjr/livetabler.git"
        }
    ]
}
```

Then install:

```bash
composer require fetsjr/livetabler:dev-main
```

### From local path (development)

For local development, add a path repository:

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "../flux-pro/tabler-main",
            "options": { "symlink": true }
        }
    ]
}
```

Then install:

```bash
composer require fetsjr/livetabler:dev-main
```

## Set up your layout

Add Tailwind CSS and Alpine.js to your layout file. If you're using Livewire, Alpine.js is already included.

```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'App' }}</title>

    {{-- Tabler UI Styles --}}
    @tablerStyles

    @livewireStyles
</head>
<body class="min-h-screen bg-light">

    {{ $slot }}

    {{-- Tabler UI Scripts --}}
    @tablerScripts
    @livewireScripts
</body>
</html>
```

## Verify installation

Create a test Blade view to confirm everything works:

```blade
<div class="p-8 space-y-4">
    <tabler:heading level="2">LiveTabler is working!</tabler:heading>

    <tabler:button>Click me</tabler:button>

    <tabler:badge color="green">Active</tabler:badge>

    <tabler:input placeholder="Type something..." />

    <tabler:card>
        <tabler:heading level="3">Card Title</tabler:heading>
        <tabler:text>This is a card with some content.</tabler:text>
    </tabler:card>
</div>
```

If you see styled components, LiveTabler is installed correctly.

## Tag prefix

All LiveTabler components use the `<tabler:...>` prefix:

```blade
{{-- Component syntax --}}
<tabler:button>Click</tabler:button>

{{-- Nested components --}}
<tabler:button.group>
    <tabler:button variant="primary">Save</tabler:button>
    <tabler:button variant="outline">Cancel</tabler:button>
</tabler:button.group>

{{-- Self-closing --}}
<tabler:separator />
<tabler:icon name="home" />
```

## Using with Dark Mode

Tabler's dark mode is typically toggled by adding the `theme-dark` class (or `data-bs-theme="dark"` in newer Bootstrap versions) to the `<body>` element. All styles and scripts are managed via `@tablerStyles` and `@tablerScripts`.

```html
<body class="theme-dark">
```

## Using with Livewire

All form components support `wire:model`:

```blade
<tabler:input wire:model="name" placeholder="Your name" />
<tabler:textarea wire:model="bio" />
<tabler:select wire:model="role">
    <tabler:select.option value="admin">Admin</tabler:select.option>
    <tabler:select.option value="user">User</tabler:select.option>
</tabler:select>
<tabler:checkbox wire:model="agreed" label="I agree" />
<tabler:switch wire:model="notifications" label="Enable notifications" />
```

## Project structure

```
tabler-main/
├── composer.json
├── src/
│   ├── TablerServiceProvider.php    # Registers components + tag compiler
│   ├── TablerTagCompiler.php        # Compiles <tabler:...> tags
│   └── helpers.php                  # Helper functions
├── stubs/
│   └── resources/
│       └── views/
│           └── tabler/              # 264 Blade component files
│               ├── button/
│               ├── input/
│               ├── modal/
│               └── ...
└── manual/                          # This documentation
```
