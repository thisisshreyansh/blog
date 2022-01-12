@props(['triggers'])
<div x-data="{show:false}" @click.away="show = false" class="relative">

    <div @click =" show =!show">
        {{$triggers}}
    </div>

    {{-- Links --}}
    <div x-show="show" style ="background-color: rgb(243, 244, 246); width: -webkit-fill-available;" class="absolute mt-2 rounded-xl z-50 overflow-auto" style="display: none">
        {{ $slot }}
    </div>
</div>