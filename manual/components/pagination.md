# Pagination

Laravel paginator wrapper with styled navigation.

## Basic usage

```blade
<tabler:pagination :paginator="$items" />
```

## Props

Uses the Laravel paginator object directly. No additional props beyond the standard paginator.

## Features

- Responsive layout (stacks on mobile)
- Shows "Showing X to Y of Z results" info
- Previous / Next buttons
- Numbered page links
- Active page highlight
- Dark mode support

## With Livewire

```blade
<!-- In your Livewire component -->
<tabler:pagination :paginator="$this->items" />
```
