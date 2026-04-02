# Accordion

Expandable/collapsible sections with optional exclusive mode.

## Basic usage

```blade
<tabler:accordion>
    <tabler:accordion.item name="faq-1">
        <tabler:accordion.heading>What is LiveTabler?</tabler:accordion.heading>
        <tabler:accordion.content>
            A Flux UI-compatible component library for Laravel.
        </tabler:accordion.content>
    </tabler:accordion.item>

    <tabler:accordion.item name="faq-2">
        <tabler:accordion.heading>How do I install it?</tabler:accordion.heading>
        <tabler:accordion.content>
            Via Composer: <code>composer require fetsjr/livetabler</code>
        </tabler:accordion.content>
    </tabler:accordion.item>
</tabler:accordion>
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `exclusive` | bool | `true` | Only one item open at a time |

## Non-exclusive mode

```blade
<tabler:accordion :exclusive="false">
    {{-- Multiple items can be open simultaneously --}}
</tabler:accordion>
```

## Sub-components

| Component | Purpose |
|---|---|
| `tabler:accordion.item` | Single accordion section (requires `name`) |
| `tabler:accordion.heading` | Clickable header/trigger |
| `tabler:accordion.content` | Collapsible body content |
| `tabler:accordion.icon` | Expand/collapse indicator icon |
