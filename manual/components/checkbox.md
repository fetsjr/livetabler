# Checkbox

Checkbox input with label, description, and groups.

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
