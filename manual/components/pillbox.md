# Pillbox

Multi-select tag/pill input with search and dropdown.

## Basic usage

```blade
<tabler:pillbox wire:model="tags">
    <tabler:pillbox.option value="laravel">Laravel</tabler:pillbox.option>
    <tabler:pillbox.option value="livewire">Livewire</tabler:pillbox.option>
    <tabler:pillbox.option value="alpine">Alpine.js</tabler:pillbox.option>
</tabler:pillbox>
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `name` | string | auto from `wire:model` | Field name |
| `placeholder` | string | `'Select items...'` | Placeholder text |

## Combobox variant

```blade
<tabler:pillbox wire:model="skills" variant="combobox" searchable placeholder="Search skills...">
    <tabler:pillbox.option value="php">PHP</tabler:pillbox.option>
    <tabler:pillbox.option value="js">JavaScript</tabler:pillbox.option>
    <tabler:pillbox.option value="python">Python</tabler:pillbox.option>
</tabler:pillbox>
```

## With create option

```blade
<tabler:pillbox wire:model="tags">
    <tabler:pillbox.option value="existing">Existing Tag</tabler:pillbox.option>
    <tabler:pillbox.option.create modal="create-tag" />
    <tabler:pillbox.option.empty>No options found</tabler:pillbox.option.empty>
</tabler:pillbox>
```

## Combobox variant props

| Prop | Type | Default | Description |
|---|---|---|---|
| `selectedSuffix` | string | `null` | Text after selected count |
| `placeholder` | string | `null` | Input placeholder |
| `searchable` | bool | `true` | Enable search filtering |
| `clearable` | bool | `null` | Show clear button |
| `invalid` | bool | `null` | Error state |

## Sub-components

| Component | Props | Purpose |
|---|---|---|
| `tabler:pillbox.option` | `value` | Selectable option |
| `tabler:pillbox.options` | — | Options dropdown container |
| `tabler:pillbox.option.create` | `modal` | Create new option button |
| `tabler:pillbox.option.empty` | — | Empty state message |
| `tabler:pillbox.input` | `placeholder`, `invalid` | Faux input display |
| `tabler:pillbox.search` | — | Search input |
| `tabler:pillbox.selected` | — | Selected pills display |
| `tabler:pillbox.trigger` | — | Toggle trigger wrapper |
| `tabler:pillbox.indicator` | — | Check indicator |
| `tabler:pillbox.empty` | — | Proxy empty component |
