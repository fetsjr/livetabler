# Timeline

Vertical or horizontal timeline for event sequences.

## Basic usage

```blade
<tabler:timeline>
    <tabler:timeline.item>
        <tabler:timeline.indicator variant="success" />
        <tabler:timeline.content>
            <p class="font-medium">Order shipped</p>
            <p class="text-sm text-gray-500">2 hours ago</p>
        </tabler:timeline.content>
    </tabler:timeline.item>

    <tabler:timeline.item>
        <tabler:timeline.indicator variant="info" />
        <tabler:timeline.content>
            <p class="font-medium">Order placed</p>
            <p class="text-sm text-gray-500">Yesterday</p>
        </tabler:timeline.content>
    </tabler:timeline.item>
</tabler:timeline>
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `horizontal` | bool | `false` | Horizontal layout instead of vertical |

## Indicator props

| Prop | Type | Default | Description |
|---|---|---|---|
| `variant` | string | `'info'` | Color: `info`, `success`, `warning`, `danger` |
| `icon` | string | `null` | Icon inside indicator |

## Horizontal

```blade
<tabler:timeline horizontal>
    <tabler:timeline.item>
        <tabler:timeline.indicator variant="success" icon="check" />
        <tabler:timeline.content>Step 1</tabler:timeline.content>
    </tabler:timeline.item>
    <tabler:timeline.item>
        <tabler:timeline.indicator variant="info" />
        <tabler:timeline.content>Step 2</tabler:timeline.content>
    </tabler:timeline.item>
</tabler:timeline>
```

## Sub-components

| Component | Props | Purpose |
|---|---|---|
| `tabler:timeline.item` | — | Single timeline entry |
| `tabler:timeline.indicator` | `variant`, `icon` | Colored dot/icon marker |
| `tabler:timeline.content` | — | Content area |
| `tabler:timeline.block` | — | Content block wrapper |
| `tabler:timeline.subgrid` | — | Grid sub-container |
