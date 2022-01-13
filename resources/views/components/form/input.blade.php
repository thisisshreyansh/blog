@props(['name','val','type','id'])

<x-form.field>
    <x-form.label name="{{ $name}}" val="{{$val ?? ''}}"/>

    <input class="border border-gray-200 p-2 w-full rounded"
           name="{{ $name }}"
           type="{{$type ?? ''}}"
           {{ $attributes(['value' => old($name) ,'id'=> $id ?? '']) }}
    >

    <x-form.error name="{{ $name }}"/>
</x-form.field>
