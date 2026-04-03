<main class="page-body">
    @php
    $fluid = $fluid ?? false;
@endphp

<div @class([
    'page-body',
    'container-xl' => !$fluid,
    'container-fluid' => $fluid,
]) {{ $attributes }}>
        {{ $slot }}
    </div>
</main>
