@props(['title'])

<div class="flex flex-col md:flex-row items-center justify-between mb-8 gap-4">
    <h1 class="text-xl font-extrabold text-brand-700 flex">
        {{ $title ?? 'xxx'}}
    </h1>

    <a href="{{ route('profile.edit') }}"
        class="flex sm:shadow sm:bg-white pl-4 flex-col-reverse sm:flex-row  items-center gap-4 hover:bg-gray-100 px-2 py-1 rounded transition">
        <span class="text-gray-600">
            {{ preg_replace('/^https?:\/\//', '', config('app.url')) }}/
            <span class="font-semibold">
                @if (Auth::check() && Auth::user())
                    {{ '@' . Auth::user()->username }}
                @else
                    {{ '@username' }}
                @endif
            </span>
        </span>
        @if (Auth::check() && Auth::user() && Auth::user()->user_image)
            <img src="{{ Auth::user()->user_image }}"
                class="size-36 sm:size-12 object-cover rounded-lg border border-gray-300" alt="Avatar">
        @else
            <img src="https://ui-avatars.com/api/?name={{ Auth::check() && Auth::user() ? Auth::user()->first_name ?? Auth::user()->username : 'User' }}"
                class="size-36 object-cover rounded-full border border-gray-300" alt="Avatar">
        @endif
    </a>
</div>
