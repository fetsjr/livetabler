<div class="position-relative w-100">
    {{-- Trigger Button que actúa como input wrapper de pills --}}
    <div
        @click="open = !open"
        class="form-control d-flex flex-wrap align-items-center gap-1 cursor-text"
        style="min-height: 38px;"
    >
        <template x-if="selectedList.length === 0 && search === ''">
            <span class="text-muted pe-none position-absolute ms-1">{{ $placeholder ?? 'Select options...' }}</span>
        </template>

        {{ $slot }}
    </div>
</div>
