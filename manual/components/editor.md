# Editor

Rich text editor with toolbar buttons for formatting.

## Basic usage

```blade
<tabler:editor>
    <tabler:editor.toolbar>
        <tabler:editor.bold />
        <tabler:editor.italic />
        <tabler:editor.underline />
        <tabler:editor.link />
        <tabler:editor.bullet />
        <tabler:editor.ordered />
    </tabler:editor.toolbar>
    <tabler:editor.content />
</tabler:editor>
```

## Full toolbar

```blade
<tabler:editor>
    <tabler:editor.toolbar>
        <tabler:editor.bold />
        <tabler:editor.italic />
        <tabler:editor.underline />
        <tabler:editor.strikethrough />
        <tabler:editor.highlight />
        <tabler:editor.subscript />
        <tabler:editor.superscript />
        <tabler:editor.code />
        <tabler:editor.blockquote />
        <tabler:editor.link />
        <tabler:editor.bullet />
        <tabler:editor.ordered />
        <tabler:editor.align />
        <tabler:editor.heading />
        <tabler:editor.undo />
        <tabler:editor.redo />
    </tabler:editor.toolbar>
    <tabler:editor.content />
</tabler:editor>
```

## Button props

| Prop | Type | Default | Description |
|---|---|---|---|
| `active` | bool | `false` | Active/pressed state |

## Features

- Contenteditable div with prose styling
- Toolbar with formatting buttons (SVG icons)
- Extensible via scripts/styles slots

## Sub-components

| Component | Purpose |
|---|---|
| `tabler:editor.toolbar` | Toolbar container |
| `tabler:editor.content` | Editable content area |
| `tabler:editor.button` | Base toolbar button |
| `tabler:editor.bold` | Bold formatting |
| `tabler:editor.italic` | Italic formatting |
| `tabler:editor.underline` | Underline formatting |
| `tabler:editor.strikethrough` | Strikethrough |
| `tabler:editor.highlight` | Text highlight |
| `tabler:editor.subscript` | Subscript |
| `tabler:editor.superscript` | Superscript |
| `tabler:editor.code` | Code block |
| `tabler:editor.blockquote` | Block quote |
| `tabler:editor.link` | Hyperlink |
| `tabler:editor.bullet` | Bullet list |
| `tabler:editor.ordered` | Ordered list |
| `tabler:editor.align` | Text alignment |
| `tabler:editor.heading` | Heading level |
| `tabler:editor.undo` | Undo action |
| `tabler:editor.redo` | Redo action |
| `tabler:editor.scripts` | Custom JS slot |
| `tabler:editor.styles` | Custom CSS slot |
