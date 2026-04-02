# Dropdown

Dropdown menu with click toggle, positioning, and keyboard support.

## Basic usage

```blade
<tabler:dropdown>
    <x-slot:trigger>
        <tabler:button>Options</tabler:button>
    </x-slot:trigger>

    <tabler:link href="/profile">Profile</tabler:link>
    <tabler:link href="/settings">Settings</tabler:link>
    <tabler:separator />
    <tabler:link href="/logout">Logout</tabler:link>
</tabler:dropdown>
```

## Props

| Prop | Type | Default | Values |
|---|---|---|---|
| `align` | string | `'right'` | `left`, `top`, `right` |
| `width` | string | `'w-56'` | Any Tailwind width class |
| `trigger` | slot | `null` | Trigger element |

## Alignment

```blade
<tabler:dropdown align="left">...</tabler:dropdown>
<tabler:dropdown align="right">...</tabler:dropdown>
```

## Custom width

```blade
<tabler:dropdown width="w-72">...</tabler:dropdown>
```
