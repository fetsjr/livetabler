@props([
    'name' => null, // The identifier for this tab
])

<button 
    type="button" 
    @click="activeTab = '{{ $name }}'"
    :class="{ 
        'border-blue-600 text-blue-600 dark:border-blue-500 dark:text-blue-500': activeTab === '{{ $name }}', 
        'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300': activeTab !== '{{ $name }}' 
    }"
    {{ $attributes->class(['font-medium text-sm px-4 py-2 border-b-2 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-1 dark:focus-visible:ring-offset-zinc-900']) }}
    role="tab"
    :aria-selected="activeTab === '{{ $name }}'"
>
    {{ $slot }}
</button>
