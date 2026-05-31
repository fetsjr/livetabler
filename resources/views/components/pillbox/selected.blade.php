<!-- Render actual visual badges/pills inside the trigger box -->
<template x-for="item in selectedList" :key="item.val">
    <span class="badge bg-light text-dark fw-bold border p-2 d-flex align-items-center gap-1">
        <span class="text-truncate" style="max-width: 150px;" x-text="item.text"></span>
        <button 
            type="button" 
            @click.stop="removeSelection(item.val)" 
            class="btn-close btn-close-white ms-1"
            style="font-size: 0.5rem;"
            aria-label="Remove"
        ></button>
    </span>
</template>
