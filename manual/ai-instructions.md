# LiveTabler — AI Instructions

> This document helps AI assistants (GitHub Copilot, ChatGPT, Claude, etc.) understand and generate code for the LiveTabler component library.

## Overview

**LiveTabler** (`fetsjr/livetabler`) is a Blade component library for Laravel that provides Tabler-styled UI components. It is a drop-in alternative to Flux UI, using the `<tabler:...>` tag prefix instead of `<flux:...>`.

## Tech Stack

| Technology | Version |
|---|---|
| PHP | ^8.1 |
| Laravel | ^10, ^11, ^12, ^13 |
| Livewire | ^3.7.4 / ^4.0 |
| Tailwind CSS | Required (utility classes) |
| Alpine.js | Included via Livewire |

## Tag Syntax

All components use the `<tabler:...>` prefix compiled by a custom `TablerTagCompiler`.

```blade
{{-- Self-closing --}}
<tabler:icon name="home" />

{{-- With content --}}
<tabler:button>Click me</tabler:button>

{{-- Sub-components use dot notation --}}
<tabler:card>
    <tabler:card.header>Title</tabler:card.header>
    <tabler:card.body>Content</tabler:card.body>
</tabler:card>
```

## Core Patterns

### 1. Props & Wire Model

Components auto-detect `wire:model` for the `name` prop:

```blade
{{-- These are equivalent --}}
<tabler:input wire:model="email" />
<tabler:input name="email" wire:model="email" />
```

### 2. Field Wrapper

Wrap form inputs with `<tabler:field>` for consistent label + error layout:

```blade
<tabler:field>
    <tabler:label>Email</tabler:label>
    <tabler:input wire:model="email" type="email" />
    <tabler:error name="email" />
</tabler:field>
```

### 3. Variants & Sizes

Many components accept `variant` and `size` props:

```blade
{{-- Button variants --}}
<tabler:button variant="primary">Primary</tabler:button>
<tabler:button variant="danger">Danger</tabler:button>
<tabler:button variant="ghost">Ghost</tabler:button>
<tabler:button variant="outline">Outline</tabler:button>

{{-- Sizes --}}
<tabler:button size="sm">Small</tabler:button>
<tabler:button size="base">Base</tabler:button>
<tabler:button size="lg">Large</tabler:button>
```

### 4. Slots

Named slots use `<x-slot:name>` syntax:

```blade
<tabler:modal name="confirm">
    <x-slot:trigger>
        <tabler:button>Open</tabler:button>
    </x-slot:trigger>
    Modal content here
</tabler:modal>
```

### 5. Alpine.js Events

Interactive components dispatch/listen to Alpine events:

```blade
{{-- Open a modal --}}
<button @click="$dispatch('open-modal', { name: 'my-modal' })">Open</button>

{{-- Close a modal --}}
<button @click="$dispatch('close-modal', { name: 'my-modal' })">Close</button>

{{-- Toast notifications --}}
<button @click="$dispatch('toast', { message: 'Saved!', type: 'success' })">Save</button>
```

### 6. Livewire Integration

```blade
{{-- Two-way binding --}}
<tabler:input wire:model="name" />
<tabler:select wire:model="role">...</tabler:select>
<tabler:checkbox wire:model="agree" />

{{-- Actions --}}
<tabler:button wire:click="save">Save</tabler:button>
```

## Complete Component Reference

### Layout Components

| Component | Key Props | Description |
|---|---|---|
| `tabler:header` | `sticky` | Page header |
| `tabler:footer` | — | Page footer |
| `tabler:container` | — | Max-width container |
| `tabler:sidebar` | `sticky`, `collapsible` | Sidebar layout |
| `tabler:sidebar.toggle` | — | Toggle button |
| `tabler:sidebar.brand` | `href`, `logo`, `name` | Logo/brand |
| `tabler:sidebar.nav` | — | Navigation section |
| `tabler:sidebar.item` | `icon`, `href`, `current`, `badge` | Nav link |
| `tabler:sidebar.group` | `heading`, `expandable` | Collapsible section |
| `tabler:sidebar.profile` | `name`, `avatar`, `description` | User profile |
| `tabler:sidebar.footer` | — | Bottom section |
| `tabler:navbar` | — | Horizontal navbar |
| `tabler:navbar.item` | `icon`, `href`, `current` | Nav item |
| `tabler:separator` | `orientation`, `vertical`, `text` | Divider line |
| `tabler:spacer` | — | Flex spacer |

### Form Components

| Component | Key Props | Description |
|---|---|---|
| `tabler:input` | `type`, `icon`, `iconTrailing`, `size`, `clearable`, `copyable` | Text input |
| `tabler:textarea` | `resize`, `rows` | Multi-line text |
| `tabler:select` | `variant`, `searchable`, `placeholder` | Select dropdown |
| `tabler:checkbox` | `variant` (`default`/`buttons`/`cards`/`pills`) | Checkbox/group |
| `tabler:radio` | `variant` (`default`/`buttons`/`cards`/`pills`/`segmented`) | Radio/group |
| `tabler:switch` | `name`, `label`, `description` | Toggle switch |
| `tabler:slider` | `min`, `max`, `step` | Range slider |
| `tabler:otp` | `length` | OTP code input |
| `tabler:date-picker` | `name` | Date input |
| `tabler:time-picker` | `name` | Time input |
| `tabler:file-upload` | `name`, `multiple` | File upload |
| `tabler:file-upload.dropzone` | `accept`, `multiple` | Drag-and-drop zone |
| `tabler:pillbox` | `placeholder` | Multi-select tags |
| `tabler:autocomplete` | `placeholder` | Search-and-select |
| `tabler:composer` | `placeholder` | Auto-resize message input |
| `tabler:field` | — | Form field wrapper |
| `tabler:label` | — | Field label |
| `tabler:error` | `name` | Validation error |
| `tabler:fieldset` | — | Fieldset group |
| `tabler:legend` | — | Fieldset legend |

### Display Components

| Component | Key Props | Description |
|---|---|---|
| `tabler:heading` | `level` (1-6) | Heading text |
| `tabler:subheading` | — | Secondary heading |
| `tabler:text` | — | Body paragraph |
| `tabler:badge` | `variant`, `color`, `size`, `icon`, `iconTrailing`, `closable` | Status badge |
| `tabler:avatar` | `src`, `name`, `size`, `color` | User avatar |
| `tabler:avatar.group` | — | Stacked avatars |
| `tabler:icon` | `name`, `variant` (`outline`/`solid`) | SVG icon |
| `tabler:card` | `variant` (`blank`/`stacked`/`outline`) | Content card |
| `tabler:card.header` | — | Card header |
| `tabler:card.body` | — | Card body |
| `tabler:card.footer` | — | Card footer |
| `tabler:profile` | `name`, `description`, `avatar`, `size` | User profile |
| `tabler:skeleton` | `variant` (`text`/`rect`/`circle`), `width`, `height` | Loading placeholder |
| `tabler:progress` | `value`, `color`, `size`, `label` | Progress bar |
| `tabler:breadcrumbs` | — | Breadcrumb trail |
| `tabler:pagination` | `:paginator` | Page navigation |
| `tabler:callout` | `variant` (`info`/`success`/`warning`/`danger`), `icon` | Alert box |
| `tabler:timeline` | `horizontal` | Event timeline |
| `tabler:calendar` | `month`, `year`, `day` | Calendar card |

### Interactive Components

| Component | Key Props | Description |
|---|---|---|
| `tabler:button` | `variant`, `size`, `icon`, `iconTrailing`, `href`, `disabled`, `square` | Button |
| `tabler:modal` | `name`, `variant` (`dialog`/`flyout`), `closable` | Modal dialog |
| `tabler:dropdown` | `align`, `width` | Dropdown menu |
| `tabler:tooltip` | `content`, `position` | Hover tooltip |
| `tabler:popover` | `position` | Click popover |
| `tabler:toast` | `position`, `duration` | Toast notifications |
| `tabler:accordion` | `exclusive` | Collapsible panels |
| `tabler:tabs` | `variant` | Tabbed content |
| `tabler:context` | `name` | Right-click menu |
| `tabler:command` | `name` | Command palette |

### Navigation Components

| Component | Key Props | Description |
|---|---|---|
| `tabler:navlist` | — | Vertical nav list |
| `tabler:navlist.item` | `icon`, `href`, `current`, `badge` | Nav link |
| `tabler:navlist.group` | `heading`, `expandable` | Collapsible group |
| `tabler:navmenu` | — | Compact nav menu |
| `tabler:navmenu.item` | `icon`, `href`, `current` | Nav link |
| `tabler:menu` | — | Action menu |
| `tabler:menu.item` | `icon`, `href`, `danger`, `shortcut` | Menu action |
| `tabler:menu.submenu` | `label` | Nested submenu |

### Advanced Components

| Component | Key Props | Description |
|---|---|---|
| `tabler:chart` | `:value`, `tooltip`, `summary` | SVG chart |
| `tabler:chart.line` | `field` | Line series |
| `tabler:chart.area` | `field` | Area fill |
| `tabler:chart.bar` | `field`, `minHeight`, `radius`, `width` | Bar series |
| `tabler:chart.axis` | `axis`, `field`, `format` | Axis labels |
| `tabler:kanban` | — | Kanban board |
| `tabler:kanban.column` | — | Board column |
| `tabler:kanban.card` | — | Card item |
| `tabler:editor` | — | Rich text editor |
| `tabler:editor.toolbar` | — | Formatting toolbar |
| `tabler:editor.content` | — | Editable area |

## Common Page Layout

```blade
{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @tablerStyles
</head>
<body class="min-h-screen bg-white dark:bg-zinc-900">
    <tabler:sidebar sticky>
        <tabler:sidebar.toggle />
        <tabler:sidebar.brand href="/" logo="/logo.svg" name="My App" />
        <tabler:sidebar.nav>
            <tabler:sidebar.item icon="home" href="/dashboard" :current="request()->is('dashboard')">
                Dashboard
            </tabler:sidebar.item>
            <tabler:sidebar.item icon="users" href="/users" :current="request()->is('users*')">
                Users
            </tabler:sidebar.item>
        </tabler:sidebar.nav>
        <tabler:sidebar.footer>
            <tabler:sidebar.profile name="{{ auth()->user()->name }}" avatar="{{ auth()->user()->avatar }}" />
        </tabler:sidebar.footer>
    </tabler:sidebar>

    <tabler:main>
        <tabler:header>
            <tabler:breadcrumbs>
                <tabler:breadcrumbs.item href="/">Home</tabler:breadcrumbs.item>
                <tabler:breadcrumbs.item>{{ $title ?? 'Page' }}</tabler:breadcrumbs.item>
            </tabler:breadcrumbs>
        </tabler:header>

        <tabler:container>
            {{ $slot }}
        </tabler:container>
    </tabler:main>

    <tabler:toast />

    @livewireScripts
    @tablerScripts
</body>
</html>
```

## Common Form Pattern

```blade
<form wire:submit="save">
    <tabler:fieldset>
        <tabler:legend>User Details</tabler:legend>

        <tabler:field>
            <tabler:label>Name</tabler:label>
            <tabler:input wire:model="name" />
            <tabler:error name="name" />
        </tabler:field>

        <tabler:field>
            <tabler:label>Email</tabler:label>
            <tabler:input wire:model="email" type="email" icon="envelope" />
            <tabler:error name="email" />
        </tabler:field>

        <tabler:field>
            <tabler:label>Role</tabler:label>
            <tabler:select wire:model="role" placeholder="Choose role...">
                <tabler:select.option value="admin">Admin</tabler:select.option>
                <tabler:select.option value="user">User</tabler:select.option>
            </tabler:select>
            <tabler:error name="role" />
        </tabler:field>

        <tabler:field>
            <tabler:label>Bio</tabler:label>
            <tabler:textarea wire:model="bio" rows="4" />
            <tabler:error name="bio" />
        </tabler:field>

        <tabler:field>
            <tabler:checkbox wire:model="agree" label="I agree to the terms" />
            <tabler:error name="agree" />
        </tabler:field>
    </tabler:fieldset>

    <div class="flex justify-end gap-2 mt-4">
        <tabler:button variant="ghost" type="button">Cancel</tabler:button>
        <tabler:button variant="primary" type="submit">Save</tabler:button>
    </div>
</form>
```

## Data Table Pattern

```blade
<tabler:table>
    <tabler:table.columns>
        <tabler:table.column>Name</tabler:table.column>
        <tabler:table.column>Email</tabler:table.column>
        <tabler:table.column>Status</tabler:table.column>
        <tabler:table.column>Actions</tabler:table.column>
    </tabler:table.columns>
    <tabler:table.rows>
        @foreach($users as $user)
            <tabler:table.row :key="$user->id">
                <tabler:table.cell>{{ $user->name }}</tabler:table.cell>
                <tabler:table.cell>{{ $user->email }}</tabler:table.cell>
                <tabler:table.cell>
                    <tabler:badge :color="$user->active ? 'green' : 'red'">
                        {{ $user->active ? 'Active' : 'Inactive' }}
                    </tabler:badge>
                </tabler:table.cell>
                <tabler:table.cell>
                    <tabler:button size="sm" variant="ghost" icon="pencil-square"
                        wire:click="edit({{ $user->id }})" />
                </tabler:table.cell>
            </tabler:table.row>
        @endforeach
    </tabler:table.rows>
</tabler:table>
<tabler:pagination :paginator="$users" />
```

## Key Rules for AI Code Generation

1. **Always use `<tabler:...>` prefix** — never `<flux:...>` or `<x-tabler::...>` (the tag compiler handles conversion)
2. **Use `wire:model` for Livewire binding** — the `name` prop is auto-detected
3. **Wrap form inputs in `<tabler:field>`** for consistent layout with label and error
4. **Use dot notation for sub-components** — e.g., `<tabler:card.header>`, `<tabler:table.row>`
5. **Dark mode is built-in** — all components support `dark:` classes automatically
6. **Alpine.js events are the standard** — use `$dispatch()` for modals, toasts, dropdowns
7. **Props are kebab-case in blade** — e.g., `icon-trailing`, not `iconTrailing`
8. **Boolean props can be shorthand** — `<tabler:button disabled>` equals `disabled="true"`
9. **All components support `class` merging** — extra Tailwind classes are merged
10. **Icons use Heroicons names** — outline variant by default
