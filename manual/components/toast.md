# Toast

Notification toast system with auto-dismiss, powered by Alpine.js events.

## Basic usage

Place the toast container once in your layout:

```blade
{{-- In your layout file --}}
<tabler:toast />
```

## Trigger from Alpine.js

```blade
<tabler:button x-on:click="$dispatch('toast-show', {
    title: 'Success!',
    text: 'Record saved.',
    type: 'success',
    timeout: 4000
})">
    Show Toast
</tabler:button>
```

## Trigger from Livewire

```php
// In your Livewire component
public function save()
{
    // ... save logic

    $this->dispatch('toast-show', [
        'title' => 'Saved!',
        'text' => 'Your changes have been saved.',
        'type' => 'success',
    ]);
}
```

## Event data

| Field | Type | Default | Values |
|---|---|---|---|
| `title` | string | — | Toast heading |
| `text` | string | — | Toast body text |
| `type` | string | — | `success` (green), `error` (red) |
| `timeout` | int | `4000` | Auto-dismiss in milliseconds |

## Sub-components

| Component | Purpose |
|---|---|
| `tabler:toast` | Toast container + Alpine.js logic |
| `tabler:toast.group` | Group wrapper for positioning |
