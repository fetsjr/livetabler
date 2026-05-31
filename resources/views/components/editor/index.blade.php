<div {{ $attributes->class(['card shadow-sm border-1 overflow-hidden']) }}>
    <!-- Headings / Toolbar could be injected here -->
    <div class="card-header bg-light p-2 d-flex align-items-center gap-1 overflow-x-auto">
         <p class="text-uppercase small fw-bold text-muted mb-0 px-2 opacity-50">Rich Text Editor Area</p>
    </div>
    
    <!-- Render content or input area -->
    <div class="card-body p-4 min-vh-25">
        {{ $slot }}
    </div>
</div>
