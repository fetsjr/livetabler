<main class="page-body">
    <div @class([
        'container-xl' => !($fluid ?? false),
        'container-fluid' => ($fluid ?? false),
    ])>
        {{ $slot }}
    </div>
</main>
