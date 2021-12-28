<x-layout>
    <x-setting heading="New Category">
        <form method="POST" action="/admin/posts/category" enctype="multipart/form-data">
            @csrf

            <x-form.input name="name" required />
            <x-form.input name="slug" required />

            <x-form.button>Add Category</x-form.button>
        </form>
    </x-setting>
</x-layout>