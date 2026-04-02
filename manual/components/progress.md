# Progress

Progress bar with color variants and sizes.

## Basic usage

```blade
<tabler:progress value="65" />
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `value` | int | `0` | Progress percentage (0-100) |
| `color` | string | `'blue'` | Bar color: `blue`, `green`, `red`, `yellow` |
| `size` | string | `'md'` | Height: `sm`, `md`, `lg` |
| `label` | string | `null` | Optional label text |

## With label

```blade
<tabler:progress value="75" label="Upload progress" color="green" />
```

## Sizes

```blade
<tabler:progress value="50" size="sm" />
<tabler:progress value="50" size="md" />
<tabler:progress value="50" size="lg" />
```

## Colors

```blade
<tabler:progress value="90" color="green" />
<tabler:progress value="50" color="yellow" />
<tabler:progress value="25" color="red" />
```
