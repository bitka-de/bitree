@props(['route' => null, 'icon' => null, 'label' => ''])

@php
    $href = $route ? route($route) : '#';
    $active = $route && request()->routeIs($route);
@endphp
<li>
<a href="{{ $href }}"
    class="flex items-center gap-2 px-4 py-2 rounded-lg {{ $active ? 'bg-brand-100 text-brand-700 font-semibold' : 'hover:bg-gray-100 text-gray-700' }}">
    @if ($icon)
        <x-dynamic-component :component="$icon" class="size-6" />
    @endif
    <span>{{ $label }}</span>
</a>
</li>
