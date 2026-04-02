# Profile

User profile display with avatar, name, and description.

## Basic usage

```blade
<tabler:profile name="John Doe" avatar="/avatar.jpg" />
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `name` | string | `''` | User display name |
| `description` | string | `null` | Secondary text (role, email) |
| `avatar` | string | `null` | Avatar image URL |
| `size` | string | `'md'` | Avatar size |

## With description

```blade
<tabler:profile
    name="Jane Smith"
    description="Administrator"
    avatar="/jane.jpg"
/>
```

## Without avatar

```blade
<tabler:profile name="John Doe" description="john@example.com" />
```
