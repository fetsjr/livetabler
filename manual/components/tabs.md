# Tabs

Tab navigation with panels, powered by Alpine.js.

## Basic usage

```blade
<tabler:tabs default="general">
    <tabler:tab.group>
        <tabler:tab name="general">General</tabler:tab>
        <tabler:tab name="security">Security</tabler:tab>
        <tabler:tab name="notifications">Notifications</tabler:tab>
    </tabler:tab.group>

    <tabler:tab.panel name="general">
        <tabler:text>General settings content</tabler:text>
    </tabler:tab.panel>

    <tabler:tab.panel name="security">
        <tabler:text>Security settings content</tabler:text>
    </tabler:tab.panel>

    <tabler:tab.panel name="notifications">
        <tabler:text>Notification preferences</tabler:text>
    </tabler:tab.panel>
</tabler:tabs>
```

## Props

### tabler:tabs

| Prop | Type | Default | Description |
|---|---|---|---|
| `default` | string | `null` | Active tab ID on load |

### tabler:tab

| Prop | Type | Default | Description |
|---|---|---|---|
| `name` | string | required | Unique tab identifier |

## Sub-components

| Component | Purpose |
|---|---|
| `tabler:tabs` | Root container with Alpine.js state |
| `tabler:tab` | Tab button |
| `tabler:tab.group` | Tab button row container |
| `tabler:tab.panel` | Tab content panel (shown when active) |
