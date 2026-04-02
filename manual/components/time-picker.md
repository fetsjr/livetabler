# Time Picker

Native time input with clock icon.

## Basic usage

```blade
<tabler:time-picker wire:model="time" />
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `name` | string | auto from `wire:model` | Field name |

## With field wrapper

```blade
<tabler:field>
    <tabler:label>Meeting Time</tabler:label>
    <tabler:time-picker wire:model="meetingTime" />
    <tabler:error name="meetingTime" />
</tabler:field>
```

## Sub-components

| Component | Props | Purpose |
|---|---|---|
| `tabler:time-picker.button` | `type` | Action button |
| `tabler:time-picker.input` | `placeholder` | Time input field |
| `tabler:time-picker.selected` | `placeholder` | Selected time display |
