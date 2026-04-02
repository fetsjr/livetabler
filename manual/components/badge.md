# Badge

Status badges and labels with variants, colors, and icons.

## Basic usage

```blade
<tabler:badge>Default</tabler:badge>
<tabler:badge color="green">Active</tabler:badge>
<tabler:badge color="red" variant="soft">Error</tabler:badge>
```

## Props

| Prop | Type | Default | Values |
|---|---|---|---|
| `variant` | string | `'solid'` | `solid`, `outline`, `soft` |
| `color` | string | `'blue'` | `blue`, `azure`, `red`, `green`, `yellow`, `gray` |
| `size` | string | `'md'` | `sm`, `md` |
| `rounded` | bool | `null` | Pill shape |
| `icon` | string | `null` | Icon name |
| `label` | string | `null` | Text (alternative to slot) |

## Variants

```blade
<tabler:badge variant="solid" color="blue">Solid</tabler:badge>
<tabler:badge variant="outline" color="blue">Outline</tabler:badge>
<tabler:badge variant="soft" color="blue">Soft</tabler:badge>
```

## Colors

```blade
<tabler:badge color="blue">Blue</tabler:badge>
<tabler:badge color="azure">Azure</tabler:badge>
<tabler:badge color="red">Red</tabler:badge>
<tabler:badge color="green">Green</tabler:badge>
<tabler:badge color="yellow">Yellow</tabler:badge>
<tabler:badge color="gray">Gray</tabler:badge>
```

## With icon

```blade
<tabler:badge icon="check" color="green">Approved</tabler:badge>
```

## Pill shape

```blade
<tabler:badge rounded>Pill badge</tabler:badge>
```

## Closable

```blade
<tabler:badge>
    Tag name
    <tabler:badge.close />
</tabler:badge>
```

## Sub-components

| Component | Purpose |
|---|---|
| `tabler:badge.close` | Close/remove button inside badge |
