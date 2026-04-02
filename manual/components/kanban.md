# Kanban

Horizontal kanban board with draggable columns and cards.

## Basic usage

```blade
<tabler:kanban>
    <tabler:kanban.column>
        <tabler:kanban.column.header heading="To Do" count="3" />
        <tabler:kanban.column.cards>
            <tabler:kanban.card>
                <p class="font-medium">Task 1</p>
                <p class="text-sm text-gray-500">Description</p>
            </tabler:kanban.card>
            <tabler:kanban.card>
                <p class="font-medium">Task 2</p>
            </tabler:kanban.card>
        </tabler:kanban.column.cards>
        <tabler:kanban.column.footer>
            <tabler:button size="sm" variant="ghost">+ Add card</tabler:button>
        </tabler:kanban.column.footer>
    </tabler:kanban.column>

    <tabler:kanban.column>
        <tabler:kanban.column.header heading="In Progress" count="1" badge="active" />
        <tabler:kanban.column.cards>
            <tabler:kanban.card>
                <p class="font-medium">Task 3</p>
            </tabler:kanban.card>
        </tabler:kanban.column.cards>
    </tabler:kanban.column>

    <tabler:kanban.column>
        <tabler:kanban.column.header heading="Done" count="5" />
        <tabler:kanban.column.cards>
            <tabler:kanban.card>
                <p class="font-medium">Task 4</p>
            </tabler:kanban.card>
        </tabler:kanban.column.cards>
    </tabler:kanban.column>
</tabler:kanban>
```

## Column header props

| Prop | Type | Default | Description |
|---|---|---|---|
| `heading` | string | `null` | Column title |
| `subheading` | string | `null` | Secondary text |
| `count` | string | `null` | Item count |
| `badge` | string | `null` | Badge label |

## Features

- Horizontally scrollable board
- Flexible card content
- Column headers with count and badge
- Column footer for actions

## Sub-components

| Component | Props | Purpose |
|---|---|---|
| `tabler:kanban.column` | — | Board column |
| `tabler:kanban.column.header` | `heading`, `subheading`, `count`, `badge` | Column title bar |
| `tabler:kanban.column.cards` | — | Cards container |
| `tabler:kanban.column.footer` | — | Column footer |
| `tabler:kanban.card` | — | Draggable card |
