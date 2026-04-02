# Menu

Vertical action menu with items, groups, separators, and submenus.

## Basic usage

```blade
<tabler:menu>
    <tabler:menu.item icon="pencil-square">Edit</tabler:menu.item>
    <tabler:menu.item icon="document-duplicate">Duplicate</tabler:menu.item>
    <tabler:menu.separator />
    <tabler:menu.item icon="trash" danger>Delete</tabler:menu.item>
</tabler:menu>
```

## Item props

| Prop | Type | Default | Description |
|---|---|---|---|
| `icon` | string | `null` | Icon name |
| `href` | string | `null` | Link URL |
| `danger` | bool | `false` | Red danger styling |
| `variant` | string | `null` | Style variant |
| `shortcut` | string | `null` | Keyboard shortcut text |

## Groups with headings

```blade
<tabler:menu>
    <tabler:menu.group heading="Actions">
        <tabler:menu.item icon="pencil-square">Edit</tabler:menu.item>
        <tabler:menu.item icon="eye">View</tabler:menu.item>
    </tabler:menu.group>
    <tabler:menu.separator />
    <tabler:menu.group heading="Danger Zone">
        <tabler:menu.item icon="trash" danger>Delete</tabler:menu.item>
    </tabler:menu.group>
</tabler:menu>
```

## With keyboard shortcuts

```blade
<tabler:menu>
    <tabler:menu.item icon="pencil-square" shortcut="⌘E">Edit</tabler:menu.item>
    <tabler:menu.item icon="document-duplicate" shortcut="⌘D">Duplicate</tabler:menu.item>
</tabler:menu>
```

## Submenu

```blade
<tabler:menu>
    <tabler:menu.item icon="home">Home</tabler:menu.item>
    <tabler:menu.submenu label="More options">
        <tabler:menu.item>Option A</tabler:menu.item>
        <tabler:menu.item>Option B</tabler:menu.item>
    </tabler:menu.submenu>
</tabler:menu>
```

## Sub-components

| Component | Props | Purpose |
|---|---|---|
| `tabler:menu.item` | `icon`, `href`, `danger`, `shortcut`, `variant` | Menu action item |
| `tabler:menu.group` | `heading` | Grouped section with label |
| `tabler:menu.heading` | — | Standalone heading |
| `tabler:menu.separator` | — | Horizontal divider |
| `tabler:menu.submenu` | `label` | Nested flyout submenu |
