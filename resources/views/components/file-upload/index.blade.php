@props([
    'name' => null,
    'multiple' => false,
])

<div 
    x-data="{
        dragover: false,
        files: [],
        handleDrop(e) {
            this.dragover = false;
            let droppedFiles = e.dataTransfer.files;
            if(!droppedFiles.length) return;
            this.files = Array.from(droppedFiles);
            this.$refs.fileInput.files = droppedFiles;
        }
    }"
    @dragover.prevent="dragover = true"
    @dragleave.prevent="dragover = false"
    @drop.prevent="handleDrop($event)"
    :class="{ 'border-primary bg-light': dragover, 'border-muted': !dragover }"
    {{ $attributes->class(['card card-sm border-dashed text-center min-vh-25 d-flex align-items-center justify-content-center p-4 cursor-pointer position-relative']) }}
>
    <!-- Hidden File Input -->
    <input 
        type="file" 
        x-ref="fileInput"
        @if($name) name="{{ $name }}" @endif
        @if($multiple) multiple @endif
        class="position-absolute h-100 w-100 top-0 start-0 opacity-0 cursor-pointer"
        style="z-index: 10;"
        @change="files = Array.from($refs.fileInput.files)"
    />

    <div class="d-flex flex-column align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-lg text-muted mb-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1" /><path d="M9 15l3 -3l3 3" /><path d="M12 12l0 9" /></svg>
        <p class="mb-1 fw-bold">Click to upload <span class="fw-normal">or drag and drop</span></p>
        <p class="small text-muted">SVG, PNG, JPG or PDF</p>
    </div>

    <!-- Active List Hook -->
    <div x-show="files.length > 0" class="position-absolute bottom-0 start-0 w-100 border-top p-2 bg-white" style="z-index: 20;">
        <p class="small text-muted mb-0" x-text="files.map(f => f.name).join(', ')"></p>
    </div>
</div>
