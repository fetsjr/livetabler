# Skeleton

Loading placeholder with animated pulse effect.

## Basic usage

```blade
<tabler:skeleton />
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `variant` | string | `'text'` | Shape: `text`, `rect`, `circle` |
| `width` | string | `'w-full'` | Tailwind width class |
| `height` | string | `'h-4'` | Tailwind height class |

## Variants

```blade
{{-- Text line --}}
<tabler:skeleton variant="text" />

{{-- Rectangle --}}
<tabler:skeleton variant="rect" width="w-48" height="h-32" />

{{-- Circle (avatar placeholder) --}}
<tabler:skeleton variant="circle" />
```

## Skeleton group

```blade
<tabler:skeleton.group>
    <tabler:skeleton variant="circle" />
    <tabler:skeleton width="w-3/4" />
    <tabler:skeleton width="w-1/2" />
</tabler:skeleton.group>
```

## Skeleton line

```blade
<tabler:skeleton.line />
<tabler:skeleton.line size="lg" />
```

## Sub-components

| Component | Props | Purpose |
|---|---|---|
| `tabler:skeleton.group` | `animate` | Wrapper for multiple skeletons |
| `tabler:skeleton.line` | `size` (`base`/`lg`), `animate` | Single text line placeholder |
