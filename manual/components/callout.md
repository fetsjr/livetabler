# Callout

Informational alert box with variant colors and optional icon.

## Basic usage

```blade
<tabler:callout>
    <tabler:callout.heading>Note</tabler:callout.heading>
    <tabler:callout.text>This is an informational message.</tabler:callout.text>
</tabler:callout>
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `variant` | string | `'info'` | Color theme: `info`, `success`, `warning`, `danger` |
| `icon` | string | `null` | Icon name |

## Variants

```blade
<tabler:callout variant="info">
    <tabler:callout.text>Informational message.</tabler:callout.text>
</tabler:callout>

<tabler:callout variant="success">
    <tabler:callout.text>Operation completed.</tabler:callout.text>
</tabler:callout>

<tabler:callout variant="warning">
    <tabler:callout.text>Please review before continuing.</tabler:callout.text>
</tabler:callout>

<tabler:callout variant="danger">
    <tabler:callout.text>This action cannot be undone.</tabler:callout.text>
</tabler:callout>
```

## With icon and link

```blade
<tabler:callout variant="warning" icon="exclamation-triangle">
    <tabler:callout.heading>Warning</tabler:callout.heading>
    <tabler:callout.text>
        Check the <tabler:callout.link href="/docs">documentation</tabler:callout.link> for details.
    </tabler:callout.text>
</tabler:callout>
```

## Sub-components

| Component | Props | Purpose |
|---|---|---|
| `tabler:callout.heading` | `icon` | Bold heading text |
| `tabler:callout.text` | — | Body text |
| `tabler:callout.link` | `external` | Inline link (opens new tab if external) |
