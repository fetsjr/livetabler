# Card

Content container with border, shadow, and multiple variants.

## Basic usage

```blade
<tabler:card>
    <tabler:heading level="3">Card Title</tabler:heading>
    <tabler:text>Card content goes here.</tabler:text>
</tabler:card>
```

## Props

| Prop | Type | Default | Values |
|---|---|---|---|
| `size` | string | `null` | `sm`, default |
| `variant` | string | `null` (blank) | `blank`, `stacked`, `outline` |

## Variants

```blade
{{-- Default: white bg, shadow, rounded --}}
<tabler:card>Default card</tabler:card>

{{-- Outline: border only, no bg/shadow --}}
<tabler:card variant="outline">Outline card</tabler:card>

{{-- Stacked: visual stacking effect --}}
<tabler:card variant="stacked">Stacked card</tabler:card>
```

## Compact size

```blade
<tabler:card size="sm">
    Smaller padding
</tabler:card>
```
