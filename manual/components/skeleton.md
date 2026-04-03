# Skeleton

Loading placeholder with animated pulse effect using native Tabler standards.

## Basic usage

```blade
<tabler:skeleton />
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `variant` | string | `'text'` | Shape: `text`, `rect`, `circle` |
| `width` | string | `null` | Bootstrap width class (e.g., `w-100`, `w-25`) |
| `height` | string | `null` | Bootstrap height class (e.g., `h-4`, `h-2`) |

## Variants

```blade
{{-- Text line --}}
<tabler:skeleton variant="text" />

{{-- Rectangle --}}
<tabler:skeleton variant="rect" class="w-50 h-6" />

{{-- Circle (avatar placeholder) --}}
<tabler:skeleton variant="circle" />
```

## Skeleton group

```blade
<tabler:skeleton.group>
    <div class="d-flex align-items-center gap-2">
        <tabler:skeleton variant="circle" />
        <div class="w-100">
            <tabler:skeleton class="w-75 mb-1" />
            <tabler:skeleton class="w-50" />
        </div>
    </div>
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
| `tabler:skeleton.line` | `size` (`sm`/`md`/`lg`), `animate` | Single text line placeholder |
