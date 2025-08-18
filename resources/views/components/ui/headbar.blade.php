{{-- resources/views/ui/headbar.blade.php --}}
@props(['title' => 'Vorschau'])
<div class="w-full bg-gradient-to-t flex h-12 items-center gap-4 from-white border-b border-gray-500/30 border-dashed mx-auto px-4">
    <a href="{{ $back ?? route('dashboard') }}" class="text-gray-400 flex w-8">
        <svg viewBox="0 0 256 256" class="h-6" fill="currentColor">
            <path d="M165.66 202.34a8 8 0 0 1-11.32 11.32l-80-80a8 8 0 0 1 0-11.32l80-80a8 8 0 0 1 11.32 11.32L91.31 128Z" />
        </svg>
    </a>
    <div class="grow flex justify-center">
        <span class=" text-xs bg-gradient-to-tl from-blue-700 to-blue-500 text-white px-4 py-1.5 rounded-full">{{ $title ?? 'Vorschau' }}</span>
    </div>

    <a href="{{ $forward ?? route('dashboard') }}" class="text-gray-400 flex w-6 justify-center">
        <svg viewBox="0 0 256 256" class="h-6" fill="currentColor">
            <path d="M64 105V40a8 8 0 0 0-16 0v65a32 32 0 0 0 0 62v49a8 8 0 0 0 16 0v-49a32 32 0 0 0 0-62Zm-8 47a16 16 0 1 1 16-16 16 16 0 0 1-16 16Zm80-95V40a8 8 0 0 0-16 0v17a32 32 0 0 0 0 62v97a8 8 0 0 0 16 0v-97a32 32 0 0 0 0-62Zm-8 47a16 16 0 1 1 16-16 16 16 0 0 1-16 16Zm104 64a32.06 32.06 0 0 0-24-31V40a8 8 0 0 0-16 0v97a32 32 0 0 0 0 62v17a8 8 0 0 0 16 0v-17a32.06 32.06 0 0 0 24-31Zm-32 16a16 16 0 1 1 16-16 16 16 0 0 1-16 16Z" />
        </svg>
    </a>
</div>
