# Radio

Radio button input with groups.

## Basic usage

```blade
<tabler:radio wire:model="plan" value="basic" label="Basic" />
<tabler:radio wire:model="plan" value="pro" label="Pro" />
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `name` | string | auto from `wire:model` | Field name |
| `value` | string | `null` | Radio value |
| `label` | string | `null` | Radio label |
| `description` | string | `null` | Help text |

## Radio group

```blade
<tabler:radio.group wire:model="plan" label="Choose plan">
    <tabler:radio value="basic" label="Basic" description="$9/month" />
    <tabler:radio value="pro" label="Pro" description="$29/month" />
    <tabler:radio value="enterprise" label="Enterprise" description="$99/month" />
</tabler:radio.group>
```

## Sub-components

| Component | Purpose |
|---|---|
| `tabler:radio.group` | Group container |
| `tabler:radio.indicator` | Custom radio indicator |
