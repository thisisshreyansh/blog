@props(['name','val'])

<label class="block mb-2 uppercase font-bold text-xs text-gray-700"
       for="{{ $name }}"
>
    {{$name}} <p style="display:inline; color:red;">{{$val ?? ''}}</p>
</label>
