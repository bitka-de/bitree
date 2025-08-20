@php
    $isLive = Auth::user()->livestatus;
@endphp

<div class="inline-flex items-center gap-2">
    <span id="livestatus-label" class="text-xs font-medium {{ $isLive ? 'text-green-700' : 'text-gray-700' }}">
        {{ $isLive ? '● Ist live' : '● Ist nicht live' }}
    </span>
    <button id="toggle-livestatus" type="button"
        class="relative inline-flex h-6 w-12 rounded-full focus:outline-none transition {{ $isLive ? 'bg-green-300' : 'bg-gray-300' }}"
        aria-pressed="{{ $isLive ? 'true' : 'false' }}">
        <span class="sr-only">Livestatus umschalten</span>
        <span id="livestatus-knob"
            class="absolute left-0 top-0 h-6 w-6 rounded-full bg-white shadow transform transition-transform {{ $isLive ? 'translate-x-6' : '' }}"></span>
    </button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('toggle-livestatus');
        const label = document.getElementById('livestatus-label');
        const knob = document.getElementById('livestatus-knob');
        let isLive = {{ $isLive ? 'true' : 'false' }};
        btn.addEventListener('click', function() {
            btn.disabled = true;
            fetch('/profile/toggle-livestatus', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content'),
                    },
                    body: JSON.stringify({})
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        isLive = data.livestatus;
                        // Update label and colors
                        label.textContent = isLive ? '● Ist live' : '● Ist nicht live';
                        label.className = 'text-xs font-medium ' + (isLive ? 'text-green-700' :
                            'text-gray-700');
                        btn.className =
                            'relative inline-flex h-6 w-12 rounded-full focus:outline-none transition ' +
                            (isLive ? 'bg-green-400' : 'bg-gray-300');
                        knob.className =
                            'absolute left-0 top-0 h-6 w-6 rounded-full bg-white shadow transform transition-transform ' +
                            (isLive ? 'translate-x-6' : '');
                    }
                })
                .finally(() => {
                    btn.disabled = false;
                });
        });
    });
</script>
