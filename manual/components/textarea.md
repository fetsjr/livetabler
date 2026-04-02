# Textarea

Multi-line text input with resize control and validation.

## Basic usage

```blade
<tabler:textarea wire:model="bio" placeholder="Tell us about yourself" />
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `name` | string | auto from `wire:model` | Field name |
| `invalid` | bool | auto from `$errors` | Error state |
| `resize` | string | `null` | `none`, `vertical`, `horizontal`, `both` |
| `rows` | int | `null` | Number of visible rows |

## Fixed size

```blade
<tabler:textarea wire:model="notes" rows="6" resize="none" />
```
