# Input

Text input with icon support, sizes, validation states, and Livewire integration.

## Basic usage

```blade
<tabler:input placeholder="Enter your email" />
<tabler:input wire:model="name" />
```

## Props

| Prop | Type | Default | Values |
|---|---|---|---|
| `name` | string | auto from `wire:model` | Field name |
| `type` | string | `'text'` | Any HTML input type |
| `variant` | string | `'default'` | Input style variant |
| `icon` | string | `null` | Leading icon name |
| `iconTrailing` | string | `null` | Trailing icon name |
| `invalid` | bool | auto from `$errors` | Force error state |
| `size` | string | `'md'` | `sm`, `md`, `lg` |

## With icons

```blade
<tabler:input icon="mail" placeholder="Email" />
<tabler:input icon="search" iconTrailing="arrow-right" placeholder="Search..." />
```

## Sizes

```blade
<tabler:input size="sm" placeholder="Small" />
<tabler:input size="md" placeholder="Medium" />
<tabler:input size="lg" placeholder="Large" />
```

## Validation

```blade
{{-- Auto-detects errors from $errors bag --}}
<tabler:input wire:model="email" type="email" />

{{-- Force invalid state --}}
<tabler:input :invalid="true" placeholder="Has error" />
```

## With field wrapper

```blade
<tabler:with-field label="Email" description="Enter your work email">
    <tabler:input wire:model="email" type="email" placeholder="user@company.com" />
</tabler:with-field>
```

## Input group

```blade
<tabler:input.group>
    <tabler:input.group.prefix>https://</tabler:input.group.prefix>
    <tabler:input wire:model="domain" placeholder="example.com" />
    <tabler:input.group.suffix>.com</tabler:input.group.suffix>
</tabler:input.group>
```

## Sub-components

| Component | Purpose |
|---|---|
| `tabler:input.clearable` | Add clear button to input |
| `tabler:input.copyable` | Add copy-to-clipboard button |
| `tabler:input.expandable` | Auto-expanding input |
| `tabler:input.file` | File input variant |
| `tabler:input.viewable` | Toggle password visibility |
| `tabler:input.group` | Input group container |
| `tabler:input.group.prefix` | Text/icon before input |
| `tabler:input.group.suffix` | Text/icon after input |
| `tabler:input.group.affix` | Generic affix |
