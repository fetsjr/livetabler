<li>
    <div class="list-timeline-icon bg-{{ $color }} text-white">
        <x-tabler::icon :name="$icon" size="14" stroke="2" />
    </div>
    <div class="list-timeline-content">
        <div class="list-timeline-time">{{ $time }}</div>
        <p class="list-timeline-title">{{ $title }}</p>
        @if ($slot->isNotEmpty())
            <p class="text-secondary">{{ $slot }}</p>
        @endif
    </div>
</li>
