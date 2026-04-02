# Avatar

User avatar with image, initials, icon, auto-color, and badge support.

## Basic usage

```blade
<tabler:avatar src="/img/user.jpg" alt="John" />
<tabler:avatar name="John Doe" />
<tabler:avatar icon="user" />
```

## Props

| Prop | Type | Default | Values |
|---|---|---|---|
| `src` | string | `null` | Image URL |
| `name` | string | `null` | User name (auto-generates initials) |
| `initials` | string | `null` | Custom initials |
| `icon` | string | `null` | Icon name |
| `iconVariant` | string | `'solid'` | Icon style |
| `size` | string | `'md'` | `xs`, `sm`, `md`, `lg`, `xl` |
| `color` | string | `null` | `auto`, `red`, `orange`, `yellow`, `lime`, `green`, `teal`, `cyan`, `blue`, `purple`, `pink` |
| `circle` | bool | `null` | Round shape |
| `badge` | array | `null` | Status badge `['color' => '...', 'position' => '...']` |
| `tooltip` | string | `null` | Hover tooltip text |
| `href` | string | `null` | Link URL |
| `as` | string | `'div'` | `div`, `a`, `button` |

## With initials

```blade
{{-- Auto-generated from name --}}
<tabler:avatar name="Jane Smith" />  {{-- Shows "JS" --}}

{{-- Custom initials --}}
<tabler:avatar initials="AB" color="purple" />
```

## Auto color

```blade
{{-- Consistent color based on name hash --}}
<tabler:avatar name="Alice" color="auto" />
<tabler:avatar name="Bob" color="auto" />
```

## Sizes

```blade
<tabler:avatar name="A" size="xs" />  {{-- 24px --}}
<tabler:avatar name="A" size="sm" />  {{-- 32px --}}
<tabler:avatar name="A" size="md" />  {{-- 40px --}}
<tabler:avatar name="A" size="lg" />  {{-- 48px --}}
<tabler:avatar name="A" size="xl" />  {{-- 64px --}}
```

## Status badge

```blade
<tabler:avatar name="User" :badge="['color' => 'green', 'position' => 'bottom-right']" />
```

## Avatar group

```blade
<tabler:avatar.group>
    <tabler:avatar name="Alice" color="auto" />
    <tabler:avatar name="Bob" color="auto" />
    <tabler:avatar name="Carol" color="auto" />
</tabler:avatar.group>
```

## Sub-components

| Component | Purpose |
|---|---|
| `tabler:avatar.group` | Overlapping avatar stack |
