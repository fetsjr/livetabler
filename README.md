# LiveTabler

A collection of **Tabler UI** Blade components for **Laravel Livewire**, inspired by [Flux](https://fluxui.dev/).

## Requirements

- PHP ^8.1
- Laravel ^10 | ^11 | ^12
- Livewire ^3.7 | ^4.0
- [Tabler CSS](https://tabler.io) loaded in your layout

## Installation

Install the package via Composer:

```bash
composer require fetsjr/livetabler
```

Publish the Tabler assets (CSS/JS):

```bash
php artisan vendor:publish --tag=tabler-assets
```

## Setup

Add the Tabler styles and scripts to your layout file:

```blade
<html>
<head>
    ...
    @tablerStyles
</head>
<body>
    ...
    @tablerScripts
</body>
</html>
```

## Usage

Once installed, all components are available under the `tabler:` namespace in your Blade templates:

```blade
<tabler:button>Click me</tabler:button>

<tabler:card>
    <tabler:heading>Hello World</tabler:heading>
    <tabler:text>Some content here.</tabler:text>
</tabler:card>

<tabler:modal>
    ...
</tabler:modal>
```

## Available Components

| Component | Tag |
|---|---|
| Accordion | `<tabler:accordion>` |
| Autocomplete | `<tabler:autocomplete>` |
| Avatar | `<tabler:avatar>` |
| Badge | `<tabler:badge>` |
| Breadcrumbs | `<tabler:breadcrumbs>` |
| Button | `<tabler:button>` |
| Calendar | `<tabler:calendar>` |
| Callout | `<tabler:callout>` |
| Card | `<tabler:card>` |
| Checkbox | `<tabler:checkbox>` |
| Command | `<tabler:command>` |
| Date Picker | `<tabler:date-picker>` |
| Dropdown | `<tabler:dropdown>` |
| Editor | `<tabler:editor>` |
| File Upload | `<tabler:file-upload>` |
| Icon | `<tabler:icon>` |
| Input | `<tabler:input>` |
| Kanban | `<tabler:kanban>` |
| Menu | `<tabler:menu>` |
| Modal | `<tabler:modal>` |
| Navbar | `<tabler:navbar>` |
| Navlist | `<tabler:navlist>` |
| Navmenu | `<tabler:navmenu>` |
| OTP | `<tabler:otp>` |
| Pagination | `<tabler:pagination>` |
| Pillbox | `<tabler:pillbox>` |
| Popover | `<tabler:popover>` |
| Progress | `<tabler:progress>` |
| Radio | `<tabler:radio>` |
| Select | `<tabler:select>` |
| Sidebar | `<tabler:sidebar>` |
| Skeleton | `<tabler:skeleton>` |
| Slider | `<tabler:slider>` |
| Table | `<tabler:table>` |
| Tabs | `<tabler:tabs>` |
| Textarea | `<tabler:textarea>` |
| Time Picker | `<tabler:time-picker>` |
| Timeline | `<tabler:timeline>` |
| Toast | `<tabler:toast>` |
| Tooltip | `<tabler:tooltip>` |

## License

MIT
