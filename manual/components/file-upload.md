# File Upload

File upload with drag-and-drop dropzone support.

## Basic usage

```blade
<tabler:file-upload wire:model="file" />
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `name` | string | `null` | Field name |
| `multiple` | bool | `false` | Allow multiple files |

## Dropzone

```blade
<tabler:file-upload.dropzone wire:model="files" multiple accept="image/*">
    <p>Drag and drop files here or click to browse</p>
</tabler:file-upload.dropzone>
```

## Dropzone props

| Prop | Type | Default | Description |
|---|---|---|---|
| `accept` | string | `null` | Accepted file types (MIME) |
| `multiple` | bool | `false` | Allow multiple files |

## Features

- Drag-and-drop visual feedback
- File type filtering via `accept`
- Multiple file support
- Alpine.js powered drag state management
- Works with Livewire file uploads

## Sub-components

| Component | Props | Purpose |
|---|---|---|
| `tabler:file-upload.dropzone` | `accept`, `multiple` | Drag-and-drop zone |
