# Popover

Floating content panel triggered by click.

## Basic usage

```blade
<tabler:popover>
    <x-slot:trigger>
        <tabler:button>Open Popover</tabler:button>
    </x-slot:trigger>

    <div class="p-4">
        <p>Popover content goes here.</p>
    </div>
</tabler:popover>
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `position` | string | `'bottom-start'` | Alignment: `bottom-start`, `bottom-end`, `top-start`, `top-end`, `right-start`, `left-start` |
| `trigger` | string | `null` | Custom trigger slot |

## Positions

```blade
<tabler:popover position="bottom-end">
    <x-slot:trigger>
        <tabler:button>Bottom End</tabler:button>
    </x-slot:trigger>
    <div class="p-4">Content</div>
</tabler:popover>

<tabler:popover position="top-start">
    <x-slot:trigger>
        <tabler:button>Top Start</tabler:button>
    </x-slot:trigger>
    <div class="p-4">Content</div>
</tabler:popover>
```

## Features

- Click to toggle (not hover)
- Click outside to close
- Animated transitions
- Position-based alignment
- Alpine.js powered
