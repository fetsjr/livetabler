<div 
    x-data="{ 
        toasts: [],
        add(toast) {
            toast.id = Date.now();
            this.toasts.push(toast);
            setTimeout(() => { this.remove(toast.id) }, toast.timeout || 4000);
        },
        remove(id) {
            this.toasts = this.toasts.filter(t => t.id !== id);
        }
    }"
    @toast-show.window="add($event.detail)"
    class="position-fixed bottom-0 end-0 z-index-toast p-4 d-flex flex-column gap-2"
    style="pointer-events: none; width: auto; max-width: 400px;"
>
    <template x-for="toast in toasts" :key="toast.id">
        <div 
            class="toast show shadow-lg border-1 pointer-events-auto"
            role="alert" 
            aria-live="assertive" 
            aria-atomic="true"
        >
            <div class="toast-header">
                <span :class="{ 'bg-success': toast.type === 'success', 'bg-danger': toast.type === 'error', 'bg-info': !toast.type }" class="p-2 me-2 rounded"></span>
                <strong class="me-auto" x-text="toast.title"></strong>
                <button type="button" @click="remove(toast.id)" class="btn-close" aria-label="Close"></button>
            </div>
            <div class="toast-body" x-show="toast.text" x-text="toast.text"></div>
        </div>
    </template>
</div>
