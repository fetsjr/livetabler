# Select

Native HTML select with custom styling, and advanced listbox/combobox variants.

## Basic usage (native)

```blade
<tabler:select wire:model="role">
    <tabler:select.option value="">Choose role...</tabler:select.option>
    <tabler:select.option value="admin">Admin</tabler:select.option>
    <tabler:select.option value="editor">Editor</tabler:select.option>
    <tabler:select.option value="viewer">Viewer</tabler:select.option>
</tabler:select>
```

## Props (native select)

| Prop | Type | Default | Values |
|---|---|---|---|
| `name` | string | auto from `wire:model` | Field name |
| `invalid` | bool | auto from `$errors` | Force error state |
| `size` | string | `'md'` | `sm`, `md`, `lg` |

## Advanced variants

### Listbox (custom dropdown)

```blade
<tabler:select variant="listbox" placeholder="Select a fruit">
    <tabler:select.option value="apple">Apple</tabler:select.option>
    <tabler:select.option value="banana">Banana</tabler:select.option>
    <tabler:select.option value="cherry">Cherry</tabler:select.option>
</tabler:select>
```

### Combobox (with search)

```blade
<tabler:select variant="combobox" placeholder="Search...">
    <tabler:select.option value="us">United States</tabler:select.option>
    <tabler:select.option value="uk">United Kingdom</tabler:select.option>
    <tabler:select.option value="ca">Canada</tabler:select.option>
</tabler:select>
```

### Custom (full control)

```blade
<tabler:select variant="custom">
    {{-- Complete custom UI --}}
</tabler:select>
```

## Searchable

```blade
<tabler:select variant="listbox" searchable placeholder="Search countries...">
    <tabler:select.option value="us">United States</tabler:select.option>
    {{-- ... --}}
</tabler:select>
```

## With indicators

```blade
{{-- Check indicator (default) --}}
<tabler:select.indicator />

{{-- Checkbox indicator --}}
<tabler:select.indicator variant="checkbox" />

{{-- Radio indicator --}}
<tabler:select.indicator variant="radio" />
```

## Create option

```blade
<tabler:select variant="listbox" searchable>
    <tabler:select.option.create wire:click="createTag($event.target.value)">
        Create new tag
    </tabler:select.option.create>
    {{-- ... options --}}
</tabler:select>
```

## Sub-components

| Component | Purpose |
|---|---|
| `tabler:select.option` | Option item |
| `tabler:select.button` | Trigger button (listbox) |
| `tabler:select.input` | Trigger input (combobox) |
| `tabler:select.options` | Dropdown panel |
| `tabler:select.search` | Search input in dropdown |
| `tabler:select.selected` | Selected value display |
| `tabler:select.empty` | Empty state (proxy) |
| `tabler:select.indicator` | Selection indicator (check/checkbox/radio) |
| `tabler:select.option.create` | "Create new" option |
| `tabler:select.option.empty` | "No results" option |
| `tabler:select.option.variants.custom` | Custom option layout |
| `tabler:select.variants.listbox` | Listbox variant |
| `tabler:select.variants.combobox` | Combobox variant |
| `tabler:select.variants.custom` | Custom variant |
