@extends('layouts.user')

@section('content')
<div class="min-h-screen max-w-md mx-auto flex flex-col">

        <header class="mb-8 text-center">
            <h1 class="text-2xl font-semibold text-blue-900 tracking-tight">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h1>
            <span class="text-blue-400 text-base">-- {{ '@'.Auth::user()->username }} --</span>
        </header>
        @if(session('success'))
            <div class="mb-4 p-3 bg-blue-100 text-blue-900 text-center rounded-xl border border-blue-200 animate-fade-in">{{ session('success') }}</div>
        @endif
        <section class="w-full">
            <form id="sortForm" method="POST" action="{{ route('mylinks.reorder') }}">
                @csrf
                <ul id="sortableLinks" class="flex flex-col gap-6">
                    @forelse($links as $link)
                        <li class="group flex items-center gap-3 bg-white border border-blue-100 shadow-sm rounded-xl p-2 transition-all duration-200 hover:border-blue-300 hover:shadow-md cursor-pointer" data-id="{{ $link->id }}">
                            <span class="flex-shrink-0 mr-1">
                                <svg viewBox="0 0 256 256" class="w-5 h-5 text-green-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M240 88.23a54.43 54.43 0 0 1-16 37L189.25 160a54.27 54.27 0 0 1-38.63 16h-.05A54.63 54.63 0 0 1 96 119.84a8 8 0 0 1 16 .45A38.62 38.62 0 0 0 150.58 160a38.39 38.39 0 0 0 27.31-11.31l34.75-34.75a38.63 38.63 0 0 0-54.63-54.63l-11 11A8 8 0 0 1 135.7 59l11-11a54.65 54.65 0 0 1 77.3 0 54.86 54.86 0 0 1 16 40.23Zm-131 97.43-11 11A38.41 38.41 0 0 1 70.6 208a38.63 38.63 0 0 1-27.29-65.94L78 107.31a38.63 38.63 0 0 1 66 28.4 8 8 0 0 0 16 .45A54.86 54.86 0 0 0 144 96a54.65 54.65 0 0 0-77.27 0L32 130.75A54.62 54.62 0 0 0 70.56 224a54.28 54.28 0 0 0 38.64-16l11-11a8 8 0 0 0-11.2-11.34Z"/>
                                </svg>
                            </span>
                            <button type="button" class="drag-handle cursor-grab bg-blue-50 hover:bg-blue-100 text-blue-400 px-2 py-2 rounded-lg focus:outline-none shadow-sm" aria-label="Sortieren" tabindex="0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="5" cy="5" r="1.5"/><circle cx="5" cy="12" r="1.5"/><circle cx="5" cy="19" r="1.5"/><circle cx="12" cy="5" r="1.5"/><circle cx="12" cy="12" r="1.5"/><circle cx="12" cy="19" r="1.5"/><circle cx="19" cy="5" r="1.5"/><circle cx="19" cy="12" r="1.5"/><circle cx="19" cy="19" r="1.5"/></svg>
                            </button>
                            <div class="flex-1 flex flex-col items-center w-full">
                                <a href="{{ $link->url }}" target="_blank" rel="noopener" class="block w-full text-lg font-semibold text-blue-900 bg-white hover:bg-blue-50 px-0 py-2 text-center rounded-lg transition-all duration-150 mb-1 tracking-tight">{{ $link->title }}</a>
                                <span class="block w-full text-xs text-blue-300 text-center truncate">{{ $link->url }}</span>
                            </div>
                            <div class="relative flex-shrink-0 ml-2">
                                <button type="button" class="dropdown-toggle bg-blue-50 hover:bg-blue-100 text-blue-400 px-2 py-2 rounded-lg focus:outline-none shadow-sm" aria-label="Aktionen" tabindex="0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="6" r="1.5"/><circle cx="12" cy="12" r="1.5"/><circle cx="12" cy="18" r="1.5"/></svg>
                                </button>
                                <div class="dropdown-menu absolute right-0 mt-2 w-32 bg-white border border-blue-100 rounded-xl shadow z-50 hidden">
                                    <button type="button" class="edit-link-btn w-full text-left px-4 py-2 text-blue-900 hover:bg-blue-50" data-link-id="{{ $link->id }}">Bearbeiten</button>
                                    <form method="POST" action="{{ route('mylinks.destroy', $link) }}" onsubmit="return confirm('Diesen Link wirklich löschen?');" class="w-full">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full text-left px-4 py-2 text-red-400 hover:bg-blue-50">Löschen</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li id="edit-form-{{ $link->id }}" class="hidden w-full">
                            <form method="POST" action="{{ route('mylinks.update', $link) }}" class="flex flex-col gap-2 bg-white border border-blue-100 rounded-xl p-4 shadow mt-2">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <input type="text" name="title" value="{{ $link->title }}" required class="border border-blue-100 px-2 py-1 bg-white text-blue-900 w-full text-sm rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200 placeholder-gray-400 transition-all duration-150" aria-label="Titel bearbeiten">
                                <input type="url" name="url" value="{{ $link->url }}" required class="border border-blue-100 px-2 py-1 bg-white text-blue-900 w-full text-sm rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200 placeholder-gray-400 transition-all duration-150" aria-label="URL bearbeiten">
                                <div class="flex gap-2 justify-end">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 font-medium text-xs rounded-lg shadow">Ändern</button>
                                    <button type="button" class="close-edit-form bg-blue-50 hover:bg-blue-100 text-blue-900 px-3 py-1 font-medium text-xs rounded-lg shadow" data-link-id="{{ $link->id }}">Abbrechen</button>
                                </div>
                            </form>
                        </li>
                        </li>
                    @empty
                        <li class="text-center text-blue-400">Du hast noch keine Links hinzugefügt.</li>
                    @endforelse
                </ul>
                <button type="button" id="saveOrderBtn" class="mt-6 w-full bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 font-semibold rounded-lg shadow">Sortierung speichern</button>
                <div id="orderStatus" class="mt-2 text-center text-sm"></div>
            </form>
        </section>
</div>
<footer class="fixed bottom-0 left-0 w-full bg-white/80 border-t border-blue-200 rounded-t-3xl shadow-2xl flex flex-col items-center py-4 z-40 backdrop-blur-md">
    <button id="openNewLinkPanel" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-xl font-semibold text-base shadow transition-all duration-150 mb-2">Neuer Link</button>
</footer>

<div id="newLinkMask" class="fixed inset-0 z-50 hidden backdrop-blur-md bg-black/40 transition-opacity duration-300"></div>
<form id="newLinkFooterForm" method="POST" action="{{ route('mylinks.store') }}" class="flex flex-col gap-4 w-full p-6 max-w-md mx-auto new-link-animate bg-white/90 border border-blue-200 rounded-2xl shadow-2xl backdrop-blur-md" style="display:none;">
    @csrf
    <input type="text" name="title" placeholder="Titel" required class="border border-blue-300 px-4 py-2 bg-white text-blue-900 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 placeholder-gray-400 transition-all duration-150" aria-label="Titel">
    <input type="url" name="url" placeholder="https://dein-link.de" required class="border border-blue-300 px-4 py-2 bg-white text-blue-900 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 placeholder-gray-400 transition-all duration-150" aria-label="URL">
    <div class="flex gap-2 justify-center">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold shadow">Speichern</button>
        <button type="button" id="closeNewLinkFooterForm" class="bg-blue-100 hover:bg-blue-200 text-blue-900 px-6 py-2 rounded-lg font-semibold shadow">Abbrechen</button>
    </div>
</form>
<style>

@keyframes fade-in { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: none; } }
.animate-fade-in { animation: fade-in 0.5s ease; }
.drag-handle:active { cursor: grabbing; }
#sortableLinks li.dragging { background: #222; }
.popover-edit-link {
  min-width: 260px;
  max-width: 95vw;
  width: 320px;
  box-sizing: border-box;
  padding: 1rem;
}
#newLinkPanel {
  box-shadow: 0 -8px 32px 0 rgba(0,0,0,0.4);
}
#newLinkPanel.active {
  transform: translateY(0);
}
@media (max-width: 640px) {
  .popover-edit-link {
    left: 50% !important;
    top: 50% !important;
    transform: translate(-50%, -50%) !important;
    width: 95vw;
    min-width: 0;
    max-width: 95vw;
    padding: 1.2rem;
    z-index: 9999;
  }
}
.popover-edit-link.dragging {
  pointer-events: none;
  opacity: 0.5;
}
    .new-link-animate {
        transform: translateY(100%);
        opacity: 0;
        transition: transform 0.5s cubic-bezier(.4,0,.2,1), opacity 0.5s cubic-bezier(.4,0,.2,1);
        max-width: calc(100vw - 4rem);
        left: 50%;
        position: fixed;
        bottom: 0;
        border-radius: 1rem 1rem 0 0;
        background: rgba(255,255,255,0.95);
        box-shadow: 0 -8px 32px 0 rgba(0,0,0,0.12);
        transform: translate(-50%, 100%);
        margin: 0;
        z-index: 60;
        padding-bottom: 2rem;
        backdrop-filter: blur(8px);
    }
.new-link-animate.active {
  transform: translate(-50%, 0);
  opacity: 1;
}
@media (max-width: 640px) {
  .new-link-animate {
    max-width: calc(100vw - 2rem);
    padding-left: 1rem;
    padding-right: 1rem;
  }
}
#newLinkMask.active {
  display: block;
  opacity: 1;
}
#newLinkMask {
  opacity: 0;
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Popover Edit: Mobil optimiert
    document.querySelectorAll('.edit-link-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            const id = btn.getAttribute('data-link-id');
            // Close all edit forms
            document.querySelectorAll('li[id^="edit-form-"]').forEach(formLi => {
                formLi.classList.add('hidden');
            });
            // Open the selected form
            const formLi = document.getElementById('edit-form-' + id);
            if (formLi) {
                formLi.classList.remove('hidden');
            }
            // Close all dropdown menus
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.add('hidden');
            });
        });
    });
    document.querySelectorAll('.close-edit-form').forEach(btn => {
        btn.addEventListener('click', function(e) {
            const id = btn.getAttribute('data-link-id');
            const formLi = document.getElementById('edit-form-' + id);
            if (formLi) {
                formLi.classList.add('hidden');
            }
        });
    });
});
const sortable = document.getElementById('sortableLinks');
let draggedLi = null;
let dragStarted = false;

Array.from(document.getElementsByClassName('drag-handle')).forEach((handle) => {
    handle.addEventListener('mousedown', function(e) {
        draggedLi = handle.closest('li');
        draggedLi.setAttribute('draggable', 'true');
        draggedLi.classList.add('dragging');
        dragStarted = true;
    });
    handle.addEventListener('touchstart', function(e) {
        draggedLi = handle.closest('li');
        draggedLi.setAttribute('draggable', 'true');
        draggedLi.classList.add('dragging');
        dragStarted = true;
    });
});

sortable.addEventListener('dragstart', function(e) {
    if (!dragStarted || !e.target.classList.contains('dragging')) {
        e.preventDefault();
        return;
    }
    e.target.style.opacity = 0.5;
});

sortable.addEventListener('dragend', function(e) {
    if (e.target.classList.contains('dragging')) {
        e.target.classList.remove('dragging');
        e.target.style.opacity = '';
        e.target.setAttribute('draggable', 'false');
        dragStarted = false;
    }
});

sortable.addEventListener('dragover', function(e) {
    e.preventDefault();
    const afterElement = getDragAfterElement(sortable, e.clientY);
    if (afterElement == null) {
        sortable.appendChild(draggedLi);
    } else {
        sortable.insertBefore(draggedLi, afterElement);
    }
});

function getDragAfterElement(container, y) {
    const draggableElements = [...container.querySelectorAll('li:not(.dragging)')];
    return draggableElements.reduce((closest, child) => {
        const box = child.getBoundingClientRect();
        const offset = y - box.top - box.height / 2;
        if (offset < 0 && offset > closest.offset) {
            return { offset: offset, element: child };
        } else {
            return closest;
        }
    }, { offset: Number.NEGATIVE_INFINITY }).element;
}

// Sortierung speichern Button nur bei Änderung anzeigen
const saveOrderBtn = document.getElementById('saveOrderBtn');
let initialOrder = Array.from(sortable.querySelectorAll('li[data-id]')).map(li => li.getAttribute('data-id'));
let orderChanged = false;
function checkOrderChanged() {
    const currentOrder = Array.from(sortable.querySelectorAll('li[data-id]')).map(li => li.getAttribute('data-id'));
    orderChanged = JSON.stringify(currentOrder) !== JSON.stringify(initialOrder);
    saveOrderBtn.style.display = orderChanged ? '' : 'none';
}
// Initial ausblenden
saveOrderBtn.style.display = 'none';
sortable.addEventListener('dragend', function(e) {
    checkOrderChanged();
});
sortable.addEventListener('drop', function(e) {
    checkOrderChanged();
});
// Nach erfolgreichem Speichern wieder ausblenden und initialOrder aktualisieren
saveOrderBtn.onclick = function() {
    const ids = Array.from(sortable.querySelectorAll('li[data-id]')).map(li => li.getAttribute('data-id'));
    const statusDiv = document.getElementById('orderStatus');
    statusDiv.textContent = 'Sortierung wird gespeichert...';
    statusDiv.className = 'mt-2 text-center text-sm text-gray-400';
    fetch("{{ route('mylinks.reorder') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        },
        body: JSON.stringify({ order: ids })
    }).then(async res => {
        let data;
        try {
            data = await res.json();
        } catch (e) {
            statusDiv.textContent = 'Serverantwort konnte nicht gelesen werden.';
            statusDiv.className = 'mt-2 text-center text-sm text-red-400';
            return;
        }
        if(data.success) {
            statusDiv.textContent = 'Sortierung erfolgreich gespeichert!';
            statusDiv.className = 'mt-2 text-center text-sm text-green-400';
            initialOrder = ids;
            saveOrderBtn.style.display = 'none';
            setTimeout(() => location.reload(), 900);
        } else {
            statusDiv.textContent = (data.message ? 'Fehler: ' + data.message : 'Fehler beim Speichern der Sortierung.');
            statusDiv.className = 'mt-2 text-center text-sm text-red-400';
        }
    }).catch((err) => {
        statusDiv.textContent = 'Fehler beim Speichern der Sortierung.';
        statusDiv.className = 'mt-2 text-center text-sm text-red-400';
    });
};
// Neuer Link im Footer mit Animation und Mask
const openNewLinkPanelBtn = document.getElementById('openNewLinkPanel');
const newLinkFooterForm = document.getElementById('newLinkFooterForm');
const closeNewLinkFooterFormBtn = document.getElementById('closeNewLinkFooterForm');
const newLinkMask = document.getElementById('newLinkMask');
if (openNewLinkPanelBtn && newLinkFooterForm && closeNewLinkFooterFormBtn && newLinkMask) {
    openNewLinkPanelBtn.addEventListener('click', () => {
        newLinkFooterForm.style.display = 'flex';
        setTimeout(() => {
            newLinkFooterForm.classList.add('active');
            newLinkMask.classList.add('active');
        }, 10);
        openNewLinkPanelBtn.style.display = 'none';
    });
    closeNewLinkFooterFormBtn.addEventListener('click', () => {
        newLinkFooterForm.classList.remove('active');
        newLinkMask.classList.remove('active');
        setTimeout(() => {
            newLinkFooterForm.style.display = 'none';
            openNewLinkPanelBtn.style.display = '';
        }, 500);
    });
    newLinkMask.addEventListener('click', () => {
        closeNewLinkFooterFormBtn.click();
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeNewLinkFooterFormBtn.click();
        }
    });
}
// Dropdown für Aktionen
 document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.dropdown-toggle').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const menu = btn.parentElement.querySelector('.dropdown-menu');
            document.querySelectorAll('.dropdown-menu').forEach(m => { if (m !== menu) m.classList.add('hidden'); });
            menu.classList.toggle('hidden');
        });
    });
    document.addEventListener('mousedown', function(e) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            if (!menu.classList.contains('hidden') && !menu.contains(e.target) && !e.target.classList.contains('dropdown-toggle')) {
                menu.classList.add('hidden');
            }
        });
    });
});
</script>
@endsection
