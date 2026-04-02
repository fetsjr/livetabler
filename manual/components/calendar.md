# Calendar

Simple calendar card showing month, year, and day.

## Basic usage

```blade
<tabler:calendar />
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `month` | string | current month (`date('F')`) | Month name |
| `year` | string | current year (`date('Y')`) | Year |
| `day` | string | current day (`date('d')`) | Day number |

## Custom date

```blade
<tabler:calendar month="December" year="2024" day="25" />
```
