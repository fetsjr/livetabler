# Modal

Dialog modal powered by Alpine.js with backdrop, transitions, and event-based control.

## Basic usage

```blade
<tabler:modal name="confirm">
    <tabler:heading level="3">Confirm action</tabler:heading>
    <tabler:text>Are you sure you want to proceed?</tabler:text>

    <div class="flex gap-2 mt-4">
        <tabler:button variant="danger">Confirm</tabler:button>
        <tabler:button variant="ghost" x-on:click="$dispatch('modal-close')">Cancel</tabler:button>
    </div>
</tabler:modal>
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `name` | string | `null` | Unique modal identifier |
| `trigger` | slot | `null` | Inline trigger element |
| `closable` | bool | `true` | Show close button (X) |
| `dismissible` | bool | `true` | Close on backdrop click or ESC |

## Open and close

### From a button

```blade
<tabler:button x-on:click="$dispatch('modal-show', { name: 'my-modal' })">
    Open Modal
</tabler:button>

<tabler:modal name="my-modal">
    Modal content here
</tabler:modal>
```

### From Livewire

```php
// In your Livewire component
$this->dispatch('modal-show', name: 'edit-user');
$this->dispatch('modal-close', name: 'edit-user');
```

### With inline trigger

```blade
<tabler:modal name="info">
    <x-slot:trigger>
        <tabler:button>Open</tabler:button>
    </x-slot:trigger>

    <tabler:text>Modal with inline trigger</tabler:text>
</tabler:modal>
```

## Close from inside

```blade
<tabler:modal name="form-modal">
    <tabler:modal.close />  {{-- X button --}}

    <tabler:heading level="3">Edit</tabler:heading>
    <tabler:button x-on:click="$dispatch('modal-close')">Done</tabler:button>
</tabler:modal>
```

## Events

| Event | Direction | Data |
|---|---|---|
| `modal-show` | → Modal | `{ name: 'modal-name' }` |
| `modal-close` | → Modal | `{ name?: 'modal-name' }` (no name = close all) |

## Sub-components

| Component | Purpose |
|---|---|
| `tabler:modal.close` | Close button (X icon) |
| `tabler:modal.trigger` | Wrapper for trigger element |
