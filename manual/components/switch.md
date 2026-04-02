# Switch

Toggle switch for boolean values.

## Basic usage

```blade
<tabler:switch wire:model="enabled" label="Enable notifications" />
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `name` | string | auto from `wire:model` | Field name |
| `label` | string | `null` | Switch label |
| `description` | string | `null` | Help text |

## With description

```blade
<tabler:switch wire:model="darkMode" label="Dark mode" description="Enable dark theme" />
```
