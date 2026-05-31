<div 
    x-show="isOpen" 
    style="display: none;"
    x-collapse
    {{ $attributes->class(['accordion-collapse collapse']) }}
    :class="{ 'show': isOpen }"
>
    <div class="accordion-body">
        {{ $slot }}
    </div>
</div>
