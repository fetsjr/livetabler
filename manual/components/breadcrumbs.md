# Breadcrumbs

Navigation breadcrumb trail.

## Basic usage

```blade
<tabler:breadcrumbs>
    <tabler:breadcrumbs.item href="/">Home</tabler:breadcrumbs.item>
    <tabler:breadcrumbs.item href="/products">Products</tabler:breadcrumbs.item>
    <tabler:breadcrumbs.item>Current Page</tabler:breadcrumbs.item>
</tabler:breadcrumbs>
```

## Item props

| Prop | Type | Default | Description |
|---|---|---|---|
| `href` | string | `null` | Link URL (omit for current page) |
| `icon` | string | `null` | Icon name |
| `separator` | string | `null` | Custom separator |

## With icons

```blade
<tabler:breadcrumbs>
    <tabler:breadcrumbs.item href="/" icon="home">Home</tabler:breadcrumbs.item>
    <tabler:breadcrumbs.item href="/settings" icon="cog-6-tooth">Settings</tabler:breadcrumbs.item>
    <tabler:breadcrumbs.item>Profile</tabler:breadcrumbs.item>
</tabler:breadcrumbs>
```

## Sub-components

| Component | Purpose |
|---|---|
| `tabler:breadcrumbs.item` | Individual breadcrumb link/text |
