@props(['triggers'])
<div x-data="{show:false}" @click.away="show = false" class="relative">

    <div @click =" show =!show">
        {{$triggers}}
    </div>

    {{-- Links --}}
    <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded-xl min-w-fit max-w-full z-50 overflow-auto max-h-52" style="display: none">
        {{ $slot }}
    </div>
</div>