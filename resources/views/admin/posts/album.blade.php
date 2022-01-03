<x-layout>
    <x-setting heading="Publish New album">
        <form method="POST" action="/admin/posts/album" enctype="multipart/form-data">
            @csrf

            <x-form.input name="album_name" required />
            <x-form.input name="album_cover" type="file" required />

            <x-form.field>
                <x-form.label name="public_status"/>
                <input type="checkbox" name="public_status" value="public_status">
                <x-form.error name="public_status"/>
            </x-form.field>

            <x-form.button>Create</x-form.button>
        </form>
    </x-setting>
</x-layout>
