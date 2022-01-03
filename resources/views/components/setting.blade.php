@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4">Links</h4>

            <ul>
                <li>
                    <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">All Albums</a>
                </li>

                <li>
                    <a href="/admin/posts/sharing" class="{{ request()->is('admin/posts/sharing') ? 'text-blue-500' : '' }}">Sharing</a>
                </li>

                <li>
                    <a href="/admin/posts/editsharing" class="{{ request()->is('admin/posts/editsharing') ? 'text-blue-500' : '' }}">Edit Sharing</a>
                </li>

                <li>
                    <a href="/admin/posts/album" class="{{ request()->is('admin/posts/album') ? 'text-blue-500' : '' }}">New Album</a>
                </li>

                <li>
                    <a href="/admin/posts/image" class="{{ request()->is('admin/posts/image') ? 'text-blue-500' : '' }}">New Image</a>
                </li>

            </ul>
        </aside>

        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
