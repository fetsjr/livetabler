@props([
    'name' => null, // The identifier that triggers this panel
])

<div 
    x-show="activeTab === '{{ $name }}'"
    style="display: none;" 
    :aria-hidden="activeTab !== '{{ $name }}'"
    x-transition:enter="transition ease-out duration-150 delay-75"
    x-transition:enter-start="opacity-0 translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    role="tabpanel"
    {{ $attributes->class(['pt-4 focus:outline-none text-gray-800 dark:text-gray-200']) }}
    tabindex="0"
>
    {{ $slot }}
</div>
