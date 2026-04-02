# Autocomplete

Search-and-select input with dropdown suggestions.

## Basic usage

```blade
<tabler:autocomplete wire:model="country" placeholder="Search countries...">
    <tabler:autocomplete.items>
        <tabler:autocomplete.item value="us">United States</tabler:autocomplete.item>
        <tabler:autocomplete.item value="uk">United Kingdom</tabler:autocomplete.item>
        <tabler:autocomplete.item value="ca">Canada</tabler:autocomplete.item>
    </tabler:autocomplete.items>
</tabler:autocomplete>
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `name` | string | auto from `wire:model` | Field name |
| `placeholder` | string | `'Search or select...'` | Input placeholder |

## Item props

| Prop | Type | Default | Description |
|---|---|---|---|
| `value` | string | `null` | Option value |

## Features

- Type-ahead search filtering
- Click or keyboard selection
- Dropdown with Alpine.js transitions
- Active item highlighting
- Chevron toggle button

## Sub-components

| Component | Purpose |
|---|---|
| `tabler:autocomplete.item` | Selectable option |
| `tabler:autocomplete.items` | Dropdown container |
