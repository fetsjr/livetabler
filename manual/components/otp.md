# OTP

One-time password input with auto-focus between fields.

## Basic usage

```blade
<tabler:otp wire:model="code" length="6" />
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `name` | string | auto from `wire:model` | Field name |
| `length` | int | `6` | Number of digits |

## Custom layout

```blade
<tabler:otp wire:model="code" length="6">
    <tabler:otp.group>
        <tabler:otp.input />
        <tabler:otp.input />
        <tabler:otp.input />
    </tabler:otp.group>
    <tabler:otp.separator />
    <tabler:otp.group>
        <tabler:otp.input />
        <tabler:otp.input />
        <tabler:otp.input />
    </tabler:otp.group>
</tabler:otp>
```

## Sub-components

| Component | Purpose |
|---|---|
| `tabler:otp.input` | Single digit input |
| `tabler:otp.group` | Group of inputs |
| `tabler:otp.separator` | Visual separator (dash) |
