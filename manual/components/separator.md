# Separator

Horizontal or vertical divider line with optional text.

## Basic usage

```blade
<tabler:separator />
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `orientation` | string | `'horizontal'` | `horizontal` or `vertical` |
| `vertical` | bool | `false` | Shorthand for vertical orientation |
| `text` | string | `null` | Centered label text |

## With text

```blade
<tabler:separator text="OR" />
```

## Vertical

```blade
<div class="flex items-center h-8">
    <span>Left</span>
    <tabler:separator vertical />
    <span>Right</span>
</div>
```
