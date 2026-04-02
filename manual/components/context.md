# Context Menu

Right-click context menu powered by Alpine.js.

## Basic usage

```blade
<tabler:context name="my-context">
    <div @contextmenu.prevent="$dispatch('open-context', { name: 'my-context', event: $event })">
        Right click here
    </div>

    <tabler:menu>
        <tabler:menu.item icon="pencil-square">Edit</tabler:menu.item>
        <tabler:menu.item icon="trash" danger>Delete</tabler:menu.item>
    </tabler:menu>
</tabler:context>
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `name` | string | `null` | Unique identifier for the context menu |

## Features

- Positioned at cursor location on right-click
- Closes on click outside or Escape
- Combine with `tabler:menu` sub-components for items
- Uses Alpine.js `@contextmenu.prevent` directive
