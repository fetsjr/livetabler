# Patterns

Common usage patterns and conventions in LiveTabler components.

## Naming conventions

All components use the `<tabler:...>` prefix. Sub-components use dot notation:

```blade
<tabler:button>                   {{-- Main component --}}
<tabler:button.group>             {{-- Sub-component --}}
<tabler:checkbox.group>           {{-- Group variant --}}
```

## Props and wire:model

Form components auto-detect `wire:model` for the `name` prop and error validation:

```blade
{{-- These are equivalent: --}}
<tabler:input wire:model="email" />
<tabler:input wire:model="email" name="email" />

{{-- Validation errors are auto-detected: --}}
<tabler:input wire:model="email" />
{{-- If $errors->has('email'), the input gets .is-invalid automatically --}}
```

## Slots

Many components accept named slots using Blade's syntax:

```blade
<tabler:table>
    <x-slot:header>
        <tabler:table.columns>
            <tabler:table.column>Name</tabler:table.column>
            <tabler:table.column>Email</tabler:table.column>
        </tabler:table.columns>
    </x-slot:header>

    <tabler:table.rows>
        <tabler:table.row>
            <tabler:table.cell>John</tabler:table.cell>
            <tabler:table.cell>john@example.com</tabler:table.cell>
        </tabler:table.row>
    </tabler:table.rows>
</tabler:table>
```

## Field Wrapper

Form components should be wrapped with `<tabler:field>` to add labels, descriptions, and error messages using standard Tabler form layouts:

```blade
<tabler:field label="Email" description="We'll never share your email.">
    <tabler:input wire:model="email" type="email" icon="envelope" />
</tabler:field>
```

## Alpine.js Interactivity

Interactive components use Alpine.js internally. You can trigger events directly:

```blade
<tabler:button x-on:click="$dispatch('modal-show', { name: 'confirm' })">
    Open Modal
</tabler:button>

<tabler:modal name="confirm">
    <tabler:heading level="3">Are you sure?</tabler:heading>
    <tabler:button variant="danger" x-on:click="$dispatch('modal-close')">
        Confirm
    </tabler:button>
</tabler:modal>
```

## Events

LiveTabler uses Alpine.js window events for cross-component communication:

| Event | Data | Used by |
|---|---|---|
| `modal-show` | `{ name }` | Modal |
| `modal-close` | `{ name? }` | Modal |
| `toast-show` | `{ title, text, type, timeout }` | Toast |

## Size system

Components follow standard Bootstrap/Tabler sizing where applicable:

| Size | Bootstrap Class | Description |
|---|---|---|
| `sm` | `.btn-sm` / `.form-control-sm` | Small |
| `md` | (default) | Medium |
| `lg` | `.btn-lg` / `.form-control-lg` | Large |

## Variant system

Many components accept a `variant` prop matching Tabler's semantic colors:

### Buttons
`primary`, `secondary`, `success`, `info`, `warning`, `danger`, `light`, `dark`, `link`, `outline-primary` (and other outlines), `ghost-primary` (and other ghosts)

### Badges
`solid`, `outline`, `soft` (uses `.bg-*-lt`)

### Cards
`card` (default), `card-sm`, `card-md`, `card-lg`, `card-stacked`

### Callouts
`info`, `success`, `warning`, `danger` (mapped to semantic backgrounds)
