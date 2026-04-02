# Tooltip

Hover/focus tooltip with configurable position.

## Basic usage

```blade
<tabler:tooltip text="More info here">
    <tabler:button>Hover me</tabler:button>
</tabler:tooltip>
```

## Props

| Prop | Type | Default | Values |
|---|---|---|---|
| `text` | string | `null` | Tooltip text |
| `position` | string | `'top'` | `top`, `bottom`, `left`, `right` |

## Positions

```blade
<tabler:tooltip text="Top tooltip" position="top">...</tabler:tooltip>
<tabler:tooltip text="Bottom tooltip" position="bottom">...</tabler:tooltip>
<tabler:tooltip text="Left tooltip" position="left">...</tabler:tooltip>
<tabler:tooltip text="Right tooltip" position="right">...</tabler:tooltip>
```

## With rich content

```blade
<tabler:tooltip>
    <x-slot:content>
        <tabler:tooltip.content>
            <strong>Rich tooltip</strong>
            <p>With HTML content</p>
        </tabler:tooltip.content>
    </x-slot:content>

    <tabler:button>Hover me</tabler:button>
</tabler:tooltip>
```

## Sub-components

| Component | Purpose |
|---|---|
| `tabler:tooltip.content` | Rich HTML tooltip content |
