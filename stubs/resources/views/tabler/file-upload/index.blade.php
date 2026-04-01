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
            
            // assign basic file info logic 
            this.files = Array.from(droppedFiles);
            // Optionally dispatch event to livewire or hidden input
            this.$refs.fileInput.files = droppedFiles;
        }
    }"
    @dragover.prevent="dragover = true"
    @dragleave.prevent="dragover = false"
    @drop.prevent="handleDrop($event)"
    :class="{ 'border-blue-500 bg-blue-50 dark:bg-blue-900/20': dragover, 'border-gray-300 dark:border-zinc-700 hover:bg-gray-50 dark:hover:bg-zinc-800/50': !dragover }"
    {{ $attributes->class(['relative flex flex-col items-center justify-center w-full min-h-[150px] rounded-lg border-2 border-dashed transition-colors']) }}
>
    <!-- Hidden File Input -->
    <input 
        type="file" 
        x-ref="fileInput"
        @if($name) name="{{ $name }}" @endif
        @if($multiple) multiple @endif
        class="absolute inset-0 z-50 m-0 h-full w-full cursor-pointer p-0 opacity-0 outline-none"
        @change="files = Array.from($refs.fileInput.files)"
    />

    <div class="flex flex-col items-center justify-center p-6 text-center">
        <!-- Default iconography -->
        <svg class="mb-3 h-10 w-10 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
        </svg>
        <p class="mb-1 text-sm text-gray-700 dark:text-gray-300">
            <span class="font-semibold">Click to upload</span> or drag and drop
        </p>
        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or PDF</p>
    </div>

    <!-- Active List Hook if we want to show simple text names via alpine -->
    <div x-show="files.length > 0" class="w-full border-t border-gray-200 dark:border-zinc-700 p-2 z-40 bg-white dark:bg-zinc-900 absolute bottom-0">
        <p class="text-xs font-medium text-gray-600 dark:text-gray-300" x-text="files.map(f => f.name).join(', ')"></p>
    </div>
</div>
