<div class="dropdown">
    <a href="#" class="btn btn-{{ $variant }} {{ ($arrow ?? true) ? 'dropdown-toggle' : '' }}" 
       data-bs-toggle="dropdown" 
       aria-expanded="false">
        @if ($icon ?? null)
            <x-tabler::icon :name="$icon" class="me-1" />
        @endif
        {{ $label ?? 'Actions' }}
    </a>
    
    <div class="dropdown-menu dropdown-menu-end">
        {{ $slot }}
    </div>
</div>
