# Icon

SVG icon component with outline and solid variants.

## Basic usage

```blade
<tabler:icon name="home" />
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `name` | string | `null` | Icon name (Heroicons) |
| `variant` | string | `'outline'` | `outline` (stroke) or `solid` (fill) |
| `class` | string | `'w-5 h-5'` | CSS size classes |

## Variants

```blade
<tabler:icon name="heart" variant="outline" />
<tabler:icon name="heart" variant="solid" />
```

## Custom size

```blade
<tabler:icon name="star" class="w-8 h-8" />
<tabler:icon name="star" class="w-4 h-4" />
```
