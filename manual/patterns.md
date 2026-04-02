# Patterns

Common usage patterns and conventions in LiveTabler components.

## Naming conventions

All components use the `<tabler:...>` prefix. Sub-components use dot notation:

```blade
<tabler:button>                   {{-- Main component --}}
<tabler:button.group>             {{-- Sub-component --}}
<tabler:checkbox.group>           {{-- Group variant --}}
<tabler:checkbox.group.variants.cards> {{-- Deep sub-component --}}
```

## Props and wire:model

Form components auto-detect `wire:model` for the `name` prop and error validation:

```blade
{{-- These are equivalent: --}}
<tabler:input wire:model="email" />
<tabler:input wire:model="email" name="email" />

{{-- Validation errors are auto-detected: --}}
<tabler:input wire:model="email" />
{{-- If $errors->has('email'), the input gets error styling automatically --}}
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

## with-field wrapper

Form components can be wrapped with `<tabler:with-field>` to add labels, descriptions, and error messages:

```blade
<tabler:with-field label="Email" description="We'll never share your email.">
    <tabler:input wire:model="email" type="email" />
</tabler:with-field>
```

The `<tabler:field>` component provides layout structure with variants:
- `block` (default) — stacked label + input
- `inline` — side-by-side label + input
- `bare` — no wrapper

## Alpine.js interactivity

Interactive components use Alpine.js internally. You can also use Alpine attributes on any component:

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

```blade
{{-- Show toast from Livewire --}}
<tabler:button wire:click="save" x-on:click="$dispatch('toast-show', { title: 'Saved!', type: 'success' })">
    Save
</tabler:button>
```

## Size system

Components that accept `size` follow a consistent scale:

| Size | Description |
|---|---|
| `xs` | Extra small (h-6) |
| `sm` | Small (h-8) |
| `md` | Medium (h-10) — default |
| `lg` | Large (h-12) |

## Variant system

Many components accept a `variant` prop:

### Buttons
`primary`, `outline`, `ghost`, `danger`, `filled`, `subtle`

### Badges
`solid`, `outline`, `soft`

### Cards
`blank` (default), `stacked`, `outline`

### Callouts
`info`, `success`, `warning`, `danger`

### Fields
`block`, `inline`, `bare`
