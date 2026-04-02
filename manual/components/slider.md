# Slider

Range input slider with visual track fill.

## Basic usage

```blade
<tabler:slider wire:model="volume" />
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `name` | string | auto from `wire:model` | Field name |
| `min` | int | `0` | Minimum value |
| `max` | int | `100` | Maximum value |
| `step` | int | `1` | Step increment |

## Custom range

```blade
<tabler:slider wire:model="price" min="0" max="1000" step="50" />
```

## With tick marks

```blade
<tabler:slider wire:model="rating" min="1" max="5" step="1">
    <tabler:slider.tick />
</tabler:slider>
```

## Sub-components

| Component | Purpose |
|---|---|
| `tabler:slider.tick` | Tick mark indicator on track |
