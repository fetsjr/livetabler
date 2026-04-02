# Table

Data table with sortable columns, header/footer slots, and pagination support.

## Basic usage

```blade
<tabler:table>
    <x-slot:header>
        <tabler:table.columns>
            <tabler:table.column>Name</tabler:table.column>
            <tabler:table.column>Email</tabler:table.column>
            <tabler:table.column>Role</tabler:table.column>
        </tabler:table.columns>
    </x-slot:header>

    <tabler:table.rows>
        @foreach($users as $user)
            <tabler:table.row>
                <tabler:table.cell>{{ $user->name }}</tabler:table.cell>
                <tabler:table.cell>{{ $user->email }}</tabler:table.cell>
                <tabler:table.cell>{{ $user->role }}</tabler:table.cell>
            </tabler:table.row>
        @endforeach
    </tabler:table.rows>
</tabler:table>
```

## Props

| Prop | Type | Default | Description |
|---|---|---|---|
| `paginate` | Paginator | `null` | Laravel paginator instance |

## With pagination

```blade
<tabler:table :paginate="$users">
    <x-slot:header>
        <tabler:table.columns>
            <tabler:table.column>Name</tabler:table.column>
        </tabler:table.columns>
    </x-slot:header>

    <tabler:table.rows>
        @foreach($users as $user)
            <tabler:table.row>
                <tabler:table.cell>{{ $user->name }}</tabler:table.cell>
            </tabler:table.row>
        @endforeach
    </tabler:table.rows>
</tabler:table>
```

## Sortable columns

```blade
<tabler:table.column>
    <tabler:table.sortable field="name" :$sortBy :$sortDirection>
        Name
    </tabler:table.sortable>
</tabler:table.column>
```

## Sub-components

| Component | Purpose |
|---|---|
| `tabler:table.columns` | Table header row wrapper (`<thead>`) |
| `tabler:table.column` | Header cell (`<th>`) |
| `tabler:table.rows` | Table body wrapper (`<tbody>`) |
| `tabler:table.row` | Table row (`<tr>`) |
| `tabler:table.cell` | Table cell (`<td>`) |
| `tabler:table.sortable` | Sortable column header |
