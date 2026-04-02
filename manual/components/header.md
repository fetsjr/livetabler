# Header

Page header with optional sticky positioning.

## Basic usage

```blade
<tabler:header>
    <tabler:brand href="/" logo="/logo.svg" name="My App" />
    <tabler:spacer />
    <tabler:profile name="John" avatar="/avatar.jpg" />
</tabler:header>
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `sticky` | bool | `false` | Stick header to top on scroll |

## Sticky header

```blade
<tabler:header sticky>
    <h1 class="text-lg font-semibold">Dashboard</h1>
</tabler:header>
```
