# Button

Versatile button component with multiple variants, sizes, colors, and icon support.

## Basic usage

```blade
<tabler:button>Click me</tabler:button>
```

## Props

| Prop | Type | Default | Values |
|---|---|---|---|
| `variant` | string | `'primary'` | `primary`, `outline`, `ghost`, `danger`, `filled`, `subtle` |
| `size` | string | `'md'` | `xs`, `sm`, `md`, `lg` |
| `color` | string | `'blue'` | `blue`, `red`, `default` |
| `icon` | string | `null` | Icon name (leading) |
| `iconTrailing` | string | `null` | Icon name (trailing) |
| `href` | string | `null` | Renders as `<a>` link |
| `type` | string | `'button'` | HTML button type |
| `loading` | bool | `false` | Show spinner |
| `square` | bool | `false` | Equal width/height (auto if no slot content) |
| `align` | string | `'center'` | Text alignment |
| `as` | string | `null` | Force element type |

## Variants

```blade
<tabler:button variant="primary">Primary</tabler:button>
<tabler:button variant="outline">Outline</tabler:button>
<tabler:button variant="ghost">Ghost</tabler:button>
<tabler:button variant="danger">Danger</tabler:button>
<tabler:button variant="filled">Filled</tabler:button>
<tabler:button variant="subtle">Subtle</tabler:button>
```

## Sizes

```blade
<tabler:button size="xs">Extra Small</tabler:button>
<tabler:button size="sm">Small</tabler:button>
<tabler:button size="md">Medium</tabler:button>
<tabler:button size="lg">Large</tabler:button>
```

## With icons

```blade
<tabler:button icon="plus">Add item</tabler:button>
<tabler:button icon="download" iconTrailing="arrow-right">Download</tabler:button>
<tabler:button icon="pencil" square />  {{-- Icon-only square button --}}
```

## As link

```blade
<tabler:button href="/dashboard">Go to Dashboard</tabler:button>
```

## Loading state

```blade
<tabler:button wire:click="save" loading>Saving...</tabler:button>
```

## Button group

```blade
<tabler:button.group>
    <tabler:button variant="outline">Left</tabler:button>
    <tabler:button variant="outline">Center</tabler:button>
    <tabler:button variant="outline">Right</tabler:button>
</tabler:button.group>
```

## Sub-components

| Component | Purpose |
|---|---|
| `tabler:button.group` | Horizontal button group with joined borders |
