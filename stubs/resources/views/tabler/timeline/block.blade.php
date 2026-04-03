<!-- A simple block wrapper if needed for advanced timeline layouts -->
<div {{ $attributes->class(['card card-sm bg-light-lt mt-2 mb-0 shadow-none border-1']) }}>
    <div class="card-body py-2 px-3 text-secondary small">
        {{ $slot }}
    </div>
</div>
