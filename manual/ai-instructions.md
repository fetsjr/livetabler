# AI Instructions for LiveTabler Library Development

When developing or modifying components and pages for this library, follow these mandates strictly.

## 1. Unified Layout System
**PROHIBITED**: Writing raw `<div class="page">`, `<header>`, or `<footer>` tags directly on pages.
**MANDATORY**: Use the `<tabler:layout />` master component.
- Always use the `type` attribute to define the layout style (vertical, horizontal, combo, boxed, fluid).
- Use slots for `sidebar` and `navbar` to keep code clean.
- Use `<tabler:page-header>` for titles and actions.
- Use `<tabler:page-body>` for the main content area.

## 2. Advanced Form Elements
**PROHIBITED**: Writing raw `<select>` tags or manual JS for DatePickers and Autocompletes.
**MANDATORY**:
- Use `<tabler:select />` for all simple and multi-select dropdowns.
- Use `<tabler:datepicker />` for all date and time inputs (vía Litepicker).
- Use `<tabler:autocomplete />` for all remote data/AJAX searches (vía Tom Select).

## 3. Style and Class Consistency
**PROHIBITED**: Adding Tailwind CSS classes or custom inline styles for standard UI elements.
**MANDATORY**:
- Use native Tabler/Bootstrap 5 utility classes (`mb-3`, `text-center`, `g-2`, etc.).
- Use Tabler-specific color classes (`bg-primary-lt`, `text-secondary`, `btn-outline-primary`).
- Ensure all components are responsive (mobile-first).

## 4. Component Structure
- **Zero-Config JS**: All components must auto-initialize their JavaScript dependencies if the library is available on the page.
- **Error Handling**: Every form component must include `@error` logic to show validation messages automatically using `is-invalid` and `invalid-feedback` classes.
- **Slots over Props**: Prefer using `$slot` for large content areas and properties for short strings or configuration flags.

## 5. Design Aesthetics (WOW Factor)
Every UI generated must feel premium:
- Use vibrant Tabler icons (`<tabler:icon />`) for all buttons and nav items.
- Maintain consistent spacing using Bootstrap 5 gutters (`gy-*`, `gx-*`).
- Ensure dark mode compatibility in all component views.
