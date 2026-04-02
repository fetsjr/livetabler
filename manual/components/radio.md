# Radio

Radio button input with groups and multiple display variants.

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

## Group variants

```blade
<tabler:radio.group variant="default">...</tabler:radio.group>
<tabler:radio.group variant="buttons">...</tabler:radio.group>
<tabler:radio.group variant="cards">...</tabler:radio.group>
<tabler:radio.group variant="pills">...</tabler:radio.group>
<tabler:radio.group variant="segmented">...</tabler:radio.group>
```

## Sub-components

| Component | Purpose |
|---|---|
| `tabler:radio.group` | Group container |
| `tabler:radio.indicator` | Custom radio indicator |
| `tabler:radio.group.variants.default` | Stacked list |
| `tabler:radio.group.variants.buttons` | Button toggle |
| `tabler:radio.group.variants.cards` | Card selection |
| `tabler:radio.group.variants.pills` | Pill selection |
| `tabler:radio.group.variants.segmented` | Segmented control |
