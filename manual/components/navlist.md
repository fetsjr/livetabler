# Navlist

Vertical navigation list for sidebars and panels.

## Basic usage

```blade
<tabler:navlist>
    <tabler:navlist.item href="/dashboard" icon="home" current>Dashboard</tabler:navlist.item>
    <tabler:navlist.item href="/users" icon="users">Users</tabler:navlist.item>
    <tabler:navlist.item href="/settings" icon="cog-6-tooth">Settings</tabler:navlist.item>
</tabler:navlist>
```

## Item props

| Prop | Type | Default | Description |
|---|---|---|---|
| `icon` | string | `null` | Icon name |
| `href` | string | `null` | Link URL |
| `current` | bool | `false` | Active/selected state |
| `badge` | string | `null` | Badge text |

## Groups

```blade
<tabler:navlist>
    <tabler:navlist.group heading="Main">
        <tabler:navlist.item href="/dashboard" icon="home" current>Dashboard</tabler:navlist.item>
        <tabler:navlist.item href="/analytics" icon="chart-bar">Analytics</tabler:navlist.item>
    </tabler:navlist.group>

    <tabler:navlist.group heading="Settings" expandable>
        <tabler:navlist.item href="/profile" icon="user">Profile</tabler:navlist.item>
        <tabler:navlist.item href="/billing" icon="credit-card">Billing</tabler:navlist.item>
    </tabler:navlist.group>
</tabler:navlist>
```

## With badges

```blade
<tabler:navlist>
    <tabler:navlist.item href="/inbox" icon="inbox">
        Inbox
        <tabler:navlist.badge color="blue">12</tabler:navlist.badge>
    </tabler:navlist.item>
    <tabler:navlist.item href="/alerts" icon="bell">
        Alerts
        <tabler:navlist.badge color="red">3</tabler:navlist.badge>
    </tabler:navlist.item>
</tabler:navlist>
```

## Sub-components

| Component | Props | Purpose |
|---|---|---|
| `tabler:navlist.item` | `icon`, `href`, `current`, `badge` | Navigation link |
| `tabler:navlist.group` | `heading`, `expandable` | Collapsible section |
| `tabler:navlist.badge` | `color` (`zinc`/`blue`/`red`) | Item counter badge |
