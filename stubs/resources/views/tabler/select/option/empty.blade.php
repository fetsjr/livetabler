@php
$classes = Flux::classes()
    ->add('data-hidden:hidden block items-center px-2 py-1.5 w-full')
    ->add('rounded-md')
    ->add('text-start text-sm font-medium')
    ->add('text-zinc-500 dark:text-zinc-300');
@endphp

<div {{ $attributes->class($classes) }} data-flux-listbox-empty>
    {{ $slot }}
</div>
