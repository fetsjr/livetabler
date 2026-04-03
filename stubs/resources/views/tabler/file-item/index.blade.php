@props([
    'name' => 'File.txt',
    'size' => '',
])

<div {{ $attributes->class(['card card-sm shadow-none border-1 p-3']) }}>
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-3">
            <!-- Generic Icon -->
            <div class="bg-blue-lt p-2 rounded text-blue">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 12l2 2l4 -4" /></svg>
            </div>
            <div class="d-flex flex-column">
                <span class="fw-bold small text-dark">{{ $name }}</span>
                @if($size)
                    <span class="text-secondary smaller">{{ $size }}</span>
                @endif
            </div>
        </div>
        <div class="ms-auto flex-shrink-0">
            {{ $slot }}
        </div>
    </div>
</div>
