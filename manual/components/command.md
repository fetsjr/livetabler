# Command Palette

Searchable command palette / spotlight dialog.

## Basic usage

```blade
<tabler:command name="command-palette">
    <tabler:command.input placeholder="Type a command or search..." />
    <tabler:command.items>
        <tabler:command.item value="dashboard" icon="home">Go to Dashboard</tabler:command.item>
        <tabler:command.item value="settings" icon="cog-6-tooth" kbd="⌘S">Settings</tabler:command.item>
        <tabler:command.item value="logout" icon="arrow-right-on-rectangle">Logout</tabler:command.item>
    </tabler:command.items>
    <tabler:command.empty />
</tabler:command>
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `name` | string | `null` | Unique identifier |

## Input props

| Prop | Type | Default | Description |
|---|---|---|---|
| `placeholder` | string | `'Type a command or search...'` | Input placeholder |
| `icon` | bool | `true` | Show search icon |
| `clearable` | bool | `true` | Show clear button |

## Item props

| Prop | Type | Default | Description |
|---|---|---|---|
| `icon` | string | `null` | Icon name |
| `kbd` | string | `null` | Keyboard shortcut display |
| `value` | string | `null` | Search-filterable value |

## Features

- Real-time search filtering
- Auto-focus input on open
- Keyboard shortcut display
- Empty state fallback
- Alpine.js powered

## Sub-components

| Component | Props | Purpose |
|---|---|---|
| `tabler:command.input` | `placeholder`, `icon`, `clearable` | Search input |
| `tabler:command.items` | — | Results list container |
| `tabler:command.item` | `icon`, `kbd`, `value` | Command option |
| `tabler:command.empty` | — | "No results" fallback |
