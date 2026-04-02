# Navmenu

Compact navigation menu for panel or card-based navigation.

## Basic usage

```blade
<tabler:navmenu>
    <tabler:navmenu.item href="/general" icon="cog-6-tooth" current>General</tabler:navmenu.item>
    <tabler:navmenu.item href="/security" icon="shield-check">Security</tabler:navmenu.item>
    <tabler:navmenu.separator />
    <tabler:navmenu.item href="/danger" icon="exclamation-triangle">Danger Zone</tabler:navmenu.item>
</tabler:navmenu>
```

## Item props

| Prop | Type | Default | Description |
|---|---|---|---|
| `icon` | string | `null` | Icon name |
| `href` | string | `null` | Link URL |
| `current` | bool | `false` | Active/selected state |

## Sub-components

| Component | Purpose |
|---|---|
| `tabler:navmenu.item` | Navigation link with optional icon |
| `tabler:navmenu.separator` | Horizontal divider line |
