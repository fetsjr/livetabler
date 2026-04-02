# Date Picker

Native date input with calendar icon.

## Basic usage

```blade
<tabler:date-picker wire:model="date" />
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `name` | string | auto from `wire:model` | Field name |

## With field wrapper

```blade
<tabler:field>
    <tabler:label>Start Date</tabler:label>
    <tabler:date-picker wire:model="startDate" />
    <tabler:error name="startDate" />
</tabler:field>
```

## Sub-components

| Component | Props | Purpose |
|---|---|---|
| `tabler:date-picker.button` | `type` | Action button |
| `tabler:date-picker.input` | `placeholder` | Date input field |
| `tabler:date-picker.selected` | `placeholder` | Selected date display |
