@props([
    'accept' => null,
    'multiple' => false,
])

<input
    type="form-control"
    type="file"
    @if ($accept) accept="{{ $accept }}" @endif
    @if ($multiple) multiple @endif
    {{ $attributes->class(['form-control']) }}
/>
