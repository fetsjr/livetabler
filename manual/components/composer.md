# Composer

Auto-resizing message input for chat or comment interfaces.

## Basic usage

```blade
<tabler:composer placeholder="Type a message..." />
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `placeholder` | string | `'Type a message...'` | Placeholder text |

## With action slot

```blade
<tabler:composer placeholder="Write a comment...">
    <x-slot:actions>
        <tabler:button size="sm">Send</tabler:button>
    </x-slot:actions>
</tabler:composer>
```

## Features

- Auto-resizing textarea (grows with content)
- Alpine.js powered height adjustment
- Action slot for buttons/icons
