<x-layout>
    <x-setting heading="Edit Album : {{$album->album_name}}">
        <form method="POST" action="/admin/posts/{{$album->album_id}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="album_name" :value="old('album_name',$album->album_name)" required />
            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="album_cover" type="file" :value="old('album_cover',$album->album_cover)" />
                </div>
                <img src="{{ asset('storage/public/' . $album->album_cover) }}" alt=" album cover" class="rounded-xl ml-6">
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
