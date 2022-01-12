<x-layout>
    <x-setting heading="Edit Album : {{$album->name}}">
        <form method="POST" action="/admin/posts/{{$album->id}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="name" :value="old('name',$album->name)" required />
            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="path" type="file" :value="old('path',$album->path)" />
                </div>
                <img src="{{ asset('storage/public/album/'.$album->id.'/'. $album->path) }}" alt=" album cover" class="rounded-xl ml-6" width="100">
            </div>

            <x-form.field>
                <x-form.label name="public_status"/>
                <input 
                type="checkbox" 
                name="public_status" 
                id="public_status"
                {{$album->public_status=='1' ? 'checked' : ''}}>
                <x-form.error name="public_status"/>
            </x-form.field>

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-layout>
