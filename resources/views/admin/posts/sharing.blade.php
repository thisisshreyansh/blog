<x-layout>
    <x-setting heading="Sharing">
        <form method="POST" action="/admin/posts/sharing" enctype="multipart/form-data">
            @csrf

            <x-form.field>
                <x-form.label name="user"/>

                <select name="user_id" id="user_id" required>

                    @foreach (\App\Models\User::all() as $user)
                        @if ($user->id !== Auth::id())
                            <option value="{{ $user->id }}"
                                {{ old('id') == $user->id ? 'selected' : '' }}
                                >
                                {{ ucwords($user->name) }}
                            </option>
                        @endif
                    @endforeach
                </select>
                
                <x-form.error name="user"/>
            </x-form.field>

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

            <x-form.button>Share</x-form.button>
        </form>
    </x-setting>
</x-layout>