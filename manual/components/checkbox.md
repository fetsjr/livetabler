# Checkbox

Checkbox input with label, description, groups, and multiple display variants.

## Basic usage

```blade
<tabler:checkbox wire:model="agreed" label="I agree to the terms" />
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `name` | string | auto from `wire:model` | Field name |
| `label` | string | `null` | Checkbox label |
| `description` | string | `null` | Help text below label |

## With description

```blade
<tabler:checkbox wire:model="newsletter" label="Subscribe" description="Get weekly updates" />
```

## Checkbox group

```blade
<tabler:checkbox.group wire:model="permissions" label="Permissions">
    <tabler:checkbox value="read" label="Read" />
    <tabler:checkbox value="write" label="Write" />
    <tabler:checkbox value="delete" label="Delete" />
</tabler:checkbox.group>
```

## Group variants

```blade
{{-- Default: stacked list --}}
<tabler:checkbox.group variant="default">...</tabler:checkbox.group>

{{-- Buttons: toggle button style --}}
<tabler:checkbox.group variant="buttons">...</tabler:checkbox.group>

{{-- Cards: selectable cards --}}
<tabler:checkbox.group variant="cards">...</tabler:checkbox.group>

{{-- Pills: pill/tag style --}}
<tabler:checkbox.group variant="pills">...</tabler:checkbox.group>
```

## Select all

```blade
<tabler:checkbox.all>Select all</tabler:checkbox.all>
```

## Sub-components

| Component | Purpose |
|---|---|
| `tabler:checkbox.group` | Group container |
| `tabler:checkbox.all` | Select/deselect all toggle |
| `tabler:checkbox.indicator` | Custom check indicator |
| `tabler:checkbox.group.variants.default` | Stacked list layout |
| `tabler:checkbox.group.variants.buttons` | Button toggle layout |
| `tabler:checkbox.group.variants.cards` | Card selection layout |
| `tabler:checkbox.group.variants.pills` | Pill selection layout |
