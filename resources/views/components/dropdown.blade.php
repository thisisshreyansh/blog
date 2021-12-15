@props(['triggers'])
<div x-data="{show:false}" @click.away="show = false">

    <div @click =" show =!show">
        {{$triggers}}
    </div>
    <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded-xl w-full z-50 max-h-52 overflow-auto" style="dispay:none;">
        {{$slot}}
       
    </div>
</div>