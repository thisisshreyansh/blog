<x-dropdown>
    <x-slot name='triggers'>
        <button  
            class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-40 text-left flex lg:inline-flex">
            Album Name
            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    <x-dropdown-item 
        href="/" 
        :active="request()->routeIs('home')"
    >
        All Albums
    </x-dropdown-item>

    @foreach (App\Models\Album::all() as $album)
        @if ($album->user_id == Auth::id() ||$album->public_status != 0)
            <x-dropdown-item
            href="/posts/{{ $album->id }}"
            :active='request()->fullUrlIs("/posts/{{ $album->id }}")'
            >
            {{ ucwords($album->name)}}
            </x-dropdown-item>
        @endif
    @endforeach

</x-dropdown>