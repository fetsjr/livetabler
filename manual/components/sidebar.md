# Sidebar

Side navigation panel with collapsible sections, branding, and profile.

## Basic usage

```blade
<tabler:sidebar>
    <tabler:sidebar.brand logo="/img/logo.svg" name="My App" href="/" />

    <tabler:sidebar.nav>
        <tabler:sidebar.item href="/dashboard" icon="home">Dashboard</tabler:sidebar.item>
        <tabler:sidebar.item href="/users" icon="users">Users</tabler:sidebar.item>

        <tabler:sidebar.group heading="Settings">
            <tabler:sidebar.item href="/settings/general">General</tabler:sidebar.item>
            <tabler:sidebar.item href="/settings/security">Security</tabler:sidebar.item>
        </tabler:sidebar.group>
    </tabler:sidebar.nav>

    <tabler:sidebar.spacer />

    <tabler:sidebar.profile name="John Doe" description="Admin" />
</tabler:sidebar>
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `collapsible` | bool | `false` | Enable collapse toggle |

## Sub-components

| Component | Purpose |
|---|---|
| `tabler:sidebar.brand` | Logo and app name |
| `tabler:sidebar.header` | Header section |
| `tabler:sidebar.nav` | Navigation container |
| `tabler:sidebar.item` | Navigation link |
| `tabler:sidebar.group` | Collapsible group |
| `tabler:sidebar.collapse` | Collapsible wrapper |
| `tabler:sidebar.search` | Search input |
| `tabler:sidebar.profile` | User profile section |
| `tabler:sidebar.spacer` | Flexible spacer |
| `tabler:sidebar.toggle` | Collapse toggle button |
| `tabler:sidebar.backdrop` | Mobile overlay backdrop |
