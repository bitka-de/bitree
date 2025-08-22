@extends('layouts.user')

@section('content')
    <div class=" mt-8 mx-auto  bg-white/40 animate-fade-in">
        <h1 class="text-4xl font-extrabold text-brand-700 mb-6 drop-shadow text-center">Builder</h1>
        <p class="text-gray-400 mb-8 leading-relaxed text-center text-balance">
            Willkommen im Builder! Hier kannst du dein Profil, deine Links und dein Design individuell gestalten.
        </p>

        <div class="mb-8 grid grid-cols-2 md:grid-cols-3 gap-4 items-center justify-center">
            @php
                $builderButtons = [
                    [
                        'type' => 'heading',
                        'label' => 'Überschrift',
                        'bg' => 'bg-brand-500',
                        'hover' => 'hover:bg-brand-600',
                    ],
                    ['type' => 'spacer', 'label' => 'Spacer', 'bg' => 'bg-gray-400', 'hover' => 'hover:bg-gray-500'],
                    ['type' => 'link', 'label' => 'Link', 'bg' => 'bg-green-500', 'hover' => 'hover:bg-green-600'],
                    ['type' => 'image', 'label' => 'Bild', 'bg' => 'bg-yellow-500', 'hover' => 'hover:bg-yellow-600'],
                    ['type' => 'text', 'label' => 'Text', 'bg' => 'bg-purple-500', 'hover' => 'hover:bg-purple-600'],
                    ['type' => 'product', 'label' => 'Produkt', 'bg' => 'bg-pink-500', 'hover' => 'hover:bg-pink-600'],
                ];
            @endphp


            <button class="size-10 bg-white border rounded-md border-gray-200 inline-flex items-center justify-center">
                <x-phosphor-text-h-one class="size-6" />
            </button>

            <button class="size-10 bg-white border rounded-md border-gray-200 inline-flex items-center justify-center">
                <x-phosphor-arrows-vertical class="size-6" />
            </button>
            <button class="size-10 bg-white border rounded-md border-gray-200 inline-flex items-center justify-center">
                <x-phosphor-link class="size-6" />
            </button>
            <button class="size-10 bg-white border rounded-md border-gray-200 inline-flex items-center justify-center">
                <x-phosphor-image class="size-6" />
            </button>

            <button class="size-10 bg-white border rounded-md border-gray-200 inline-flex items-center justify-center">
                <x-phosphor-play class="size-6" />
            </button>

            <button class="size-10 bg-white border rounded-md border-gray-200 inline-flex items-center justify-center">
                <x-phosphor-music-notes class="size-6" />
            </button>
            <button class="size-10 bg-white border rounded-md border-gray-200 inline-flex items-center justify-center">
                <x-phosphor-text-align-left class="size-6" />
            </button>

            <button class="size-10 bg-white border rounded-md border-gray-200 inline-flex items-center justify-center">
                <x-phosphor-cube class="size-6" />
            </button>

            @foreach ($builderButtons as $btn)
                <button
                    class="builder-add-btn px-6 py-2 rounded-xl {{ $btn['bg'] }} text-white font-semibold shadow {{ $btn['hover'] }} transition"
                    data-type="{{ $btn['type'] }}">{{ $btn['label'] }}</button>
            @endforeach
        </div>

        <div id="builder-fields" class="flex flex-col gap-2"></div>


    </div>
    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.7s cubic-bezier(.4, 0, .2, 1) both;
        }
    </style>
    <script defer>
        document.addEventListener('DOMContentLoaded', function() {
            const fieldTypes = [{
                    type: 'heading',
                    label: 'Überschrift'
                },
                {
                    type: 'spacer',
                    label: 'Spacer'
                },
                {
                    type: 'link',
                    label: 'Link'
                },
                {
                    type: 'image',
                    label: 'Bild'
                },
                {
                    type: 'text',
                    label: 'Text'
                }
            ];

            const fields = [];
            const container = document.getElementById('builder-fields');


            document.querySelectorAll('.builder-add-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const type = btn.getAttribute('data-type');
                    const field = {
                        type,
                        id: Date.now() + Math.random()
                    };
                    fields.push(field);
                    renderFields();
                });
            });

            // Render fields
            function renderFields() {
                container.innerHTML = '';
                fields.forEach((field, idx) => {
                    const box = document.createElement('div');
                    box.className =
                        'builder-field-box mb-4 p-4 bg-white/70 rounded-xl shadow flex items-center gap-4';
                    box.setAttribute('draggable', 'true');
                    box.setAttribute('data-idx', idx);
                    box.innerHTML = getFieldContent(field);
                    // Drag handle
                    const dragHandle = document.createElement('span');
                    dragHandle.className = 'cursor-move text-gray-400 mr-2';
                    dragHandle.innerHTML =
                        '<svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="5" cy="5" r="2"/><circle cx="12" cy="5" r="2"/><circle cx="19" cy="5" r="2"/><circle cx="5" cy="12" r="2"/><circle cx="12" cy="12" r="2"/><circle cx="19" cy="12" r="2"/><circle cx="5" cy="19" r="2"/><circle cx="12" cy="19" r="2"/><circle cx="19" cy="19" r="2"/></svg>';
                    box.prepend(dragHandle);
                    // Remove button
                    const removeBtn = document.createElement('button');
                    removeBtn.className =
                        'ml-auto p-2 rounded-full bg-red-100 text-red-600 hover:bg-red-200 flex items-center';
                    removeBtn.innerHTML =
                        '<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 7v12a2 2 0 002 2h8a2 2 0 002-2V7M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3M4 7h16" /></svg>';
                    removeBtn.title = 'Entfernen';
                    removeBtn.onclick = () => {
                        fields.splice(idx, 1);
                        renderFields();
                    };
                    box.appendChild(removeBtn);
                    container.appendChild(box);
                });
                makeSortable();
            }

            // Field content
            function getFieldContent(field) {
                switch (field.type) {
                    case 'heading':
                        return '<input type="text" class="w-full font-bold text-xl bg-transparent outline-none" placeholder="Überschrift...">';
                    case 'spacer':
                        return '<div class="h-6 w-full bg-gray-100 rounded"></div>';
                    case 'link':
                        return '<input type="text" class="w-1/2 bg-transparent outline-none" placeholder="Link-Titel"> <input type="url" class="w-1/2 bg-transparent outline-none" placeholder="https://...">';
                    case 'image':
                        return '<input type="text" class="w-full bg-transparent outline-none" placeholder="Bild-URL">';
                    case 'text':
                        return '<textarea class="w-full bg-transparent outline-none" rows="2" placeholder="Text..."></textarea>';
                    case 'product':
                        return '<input type="text" class="w-1/2 bg-transparent outline-none" placeholder="Produktname"> <input type="text" class="w-1/2 bg-transparent outline-none" placeholder="Preis">';
                    default:
                        return '';
                }
            }

            // Sortable logic
            function makeSortable() {
                let dragSrcIdx = null;
                container.querySelectorAll('.builder-field-box').forEach(box => {
                    box.addEventListener('dragstart', function(e) {
                        dragSrcIdx = +box.getAttribute('data-idx');
                        box.classList.add('opacity-50');
                    });
                    box.addEventListener('dragend', function(e) {
                        box.classList.remove('opacity-50');
                    });
                    box.addEventListener('dragover', function(e) {
                        e.preventDefault();
                        box.classList.add('ring-2', 'ring-brand-300');
                    });
                    box.addEventListener('dragleave', function(e) {
                        box.classList.remove('ring-2', 'ring-brand-300');
                    });
                    box.addEventListener('drop', function(e) {
                        e.preventDefault();
                        box.classList.remove('ring-2', 'ring-brand-300');
                        const dropIdx = +box.getAttribute('data-idx');
                        if (dragSrcIdx !== null && dragSrcIdx !== dropIdx) {
                            const moved = fields.splice(dragSrcIdx, 1)[0];
                            fields.splice(dropIdx, 0, moved);
                            renderFields();
                        }
                    });
                });
            }
        });
    </script>
@endsection
