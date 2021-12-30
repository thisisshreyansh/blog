<x-layout>
    <x-setting heading="Publish New Image">
        <form method="POST" action="/admin/posts/image" enctype="multipart/form-data">
            @csrf

            <x-form.input name="image_name" required />
            <x-form.input name="image_path" type="file" required />

            <x-form.field>
                <x-form.label name="album"/>

                <select name="album_id" id="album_id" required>

                    @foreach (\App\Models\Album::all() as $album)
                        @if ($album->user_id === Auth::id())
                        <option
                            value="{{ $album->album_id }}"
                            {{ old('album_id') == $album->album_id ? 'selected' : '' }}
                        >{{ ucwords($album->album_name) }}</option>
                        @endif
                    @endforeach
                </select>
                
                <x-form.error name="album"/>
            </x-form.field>

            <x-form.button>Add Image</x-form.button>
        </form>
    </x-setting>
</x-layout>