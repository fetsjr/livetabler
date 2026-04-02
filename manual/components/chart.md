# Chart

SVG-based chart system with line, area, bar, and point types.

## Basic usage (line chart)

```blade
<tabler:chart :value="$data">
    <tabler:chart.svg>
        <tabler:chart.line field="value" />
        <tabler:chart.point field="value" />
    </tabler:chart.svg>
    <tabler:chart.axis axis="x" field="label" />
    <tabler:chart.axis axis="y" />
</tabler:chart>
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `value` | array | `null` | Chart data array |
| `tooltip` | string | `null` | Tooltip slot |
| `summary` | string | `null` | Summary slot |
| `svg` | string | `null` | SVG slot |

## Chart types

### Area chart

```blade
<tabler:chart :value="$data">
    <tabler:chart.svg>
        <tabler:chart.area field="revenue" />
        <tabler:chart.line field="revenue" />
    </tabler:chart.svg>
</tabler:chart>
```

### Bar chart

```blade
<tabler:chart :value="$data">
    <tabler:chart.svg>
        <tabler:chart.bar field="count" />
    </tabler:chart.svg>
</tabler:chart>
```

### Stacked / grouped

```blade
<tabler:chart :value="$data">
    <tabler:chart.svg>
        <tabler:chart.stack>
            <tabler:chart.bar field="sales" />
            <tabler:chart.bar field="returns" />
        </tabler:chart.stack>
    </tabler:chart.svg>
</tabler:chart>
```

## With tooltip

```blade
<tabler:chart :value="$data">
    <tabler:chart.svg>
        <tabler:chart.line field="value" />
        <tabler:chart.cursor />
    </tabler:chart.svg>

    <tabler:chart.tooltip>
        <tabler:chart.tooltip.heading field="date" />
        <tabler:chart.tooltip.value label="Revenue" field="value" prefix="$" />
    </tabler:chart.tooltip>
</tabler:chart>
```

## With axis

```blade
<tabler:chart.axis axis="x" field="month" />
<tabler:chart.axis axis="y" format="currency" />
```

## Axis props

| Prop | Type | Default | Description |
|---|---|---|---|
| `axis` | string | `'x'` | Axis direction: `x` or `y` |
| `field` | string | `'index'` (x) / `'value'` (y) | Data field |
| `format` | string | `null` | Value format |
| `position` | string | `null` | Axis position |
| `tickValues` | array | `null` | Custom tick values |

## Chart element props

| Prop | Type | Default | Description |
|---|---|---|---|
| `field` | string | `'value'` | Data field to plot |

## Bar-specific props

| Prop | Type | Default | Description |
|---|---|---|---|
| `field` | string | `'value'` | Data field |
| `minHeight` | string | `null` | Minimum bar height |
| `radius` | string | `null` | Border radius |
| `width` | string | `null` | Bar width |

## Sub-components

| Component | Props | Purpose |
|---|---|---|
| `tabler:chart.svg` | `gutter` | SVG container |
| `tabler:chart.viewport` | — | Viewport wrapper |
| `tabler:chart.line` | `field` | Line path |
| `tabler:chart.area` | `field` | Filled area |
| `tabler:chart.bar` | `field`, `minHeight`, `radius`, `width` | Bar element |
| `tabler:chart.point` | `field` | Data point circles |
| `tabler:chart.cursor` | — | Hover cursor line |
| `tabler:chart.stack` | — | Stacked/grouped container |
| `tabler:chart.group` | — | Element group |
| `tabler:chart.zero-line` | — | Dashed zero reference line |
| `tabler:chart.value` | `field`, `format` | Text value display |
| `tabler:chart.axis` | `axis`, `field`, `format`, `position`, `tickValues` | Axis labels |
| `tabler:chart.legend` | `label`, `field`, `format` | Legend entry |
| `tabler:chart.tooltip` | `field`, `format` | Tooltip container |
| `tabler:chart.tooltip.heading` | `field`, `format` | Tooltip header |
| `tabler:chart.tooltip.value` | `label`, `field`, `format`, `prefix`, `suffix` | Tooltip data row |
| `tabler:chart.summary` | — | Summary container |
| `tabler:chart.summary.value` | `field`, `format`, `fallback` | Summary value |
