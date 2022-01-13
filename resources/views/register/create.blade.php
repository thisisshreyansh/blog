<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Register!</h1>
                @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
            @endif
                <form method="POST" action="/register" class="mt-10">
                    @csrf

                    <x-form.input name="name"  required />
                    <x-form.input name="username" required />
                    <x-form.input name="email"  type="email" required />
                    <x-form.input name="password" type="password" autocomplete="new-password" required />
                    <br/>
                    <label class="block mb-2 text-xs text-red-500"
                        for="fields with * are mandatory"
                    >
                    <i>fields with * are mandatory</i>
                    </label>
                    <x-form.button>Sign Up</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>