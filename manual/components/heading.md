# Heading

Typography heading component with semantic levels.

## Basic usage

```blade
<tabler:heading>Default heading</tabler:heading>
<tabler:heading level="1">Page title</tabler:heading>
<tabler:heading level="2">Section title</tabler:heading>
<tabler:heading level="3">Subsection</tabler:heading>
```

## Props

| Prop | Type | Default | Values |
|---|---|---|---|
| `level` | int | `null` | `1`, `2`, `3`, `4`, `5`, `6` |

The heading renders as the corresponding `<h1>` through `<h6>` element.

## Subheading

```blade
<tabler:subheading>Secondary descriptive text</tabler:subheading>
```
