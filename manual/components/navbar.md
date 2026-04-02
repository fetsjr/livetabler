# Navbar

Top navigation bar with items and badges.

## Basic usage

```blade
<tabler:navbar>
    <tabler:navbar.item href="/" active>Home</tabler:navbar.item>
    <tabler:navbar.item href="/about">About</tabler:navbar.item>
    <tabler:navbar.item href="/contact">
        Contact
        <tabler:navbar.badge>3</tabler:navbar.badge>
    </tabler:navbar.item>
</tabler:navbar>
```

## Props

| Prop | Type | Default | Values |
|---|---|---|---|
| `variant` | string | `'default'` | Navbar style |

## Sub-components

| Component | Purpose |
|---|---|
| `tabler:navbar.item` | Navigation link |
| `tabler:navbar.badge` | Notification badge on item |
