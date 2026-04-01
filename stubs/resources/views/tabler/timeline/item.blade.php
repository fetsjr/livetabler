<!-- An item in the timeline list -->
<li {{ $attributes->class(['relative flex gap-4']) }}>
    <!-- The line connector (hidden on last item using Tailwind last: pseudo class pseudo via CSS, or we handle gracefully with a pseudo element) -->
    <div class="absolute left-[0.875rem] top-8 -bottom-8 border-l-2 border-dashed border-gray-200 dark:border-zinc-700 group-last:border-transparent last:hidden"></div>
    
    {{ $slot }}
</li>
