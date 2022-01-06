<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Verify Your Email Address!</h1>

                    <label class="block mb-2 text-xs text-red-500"
                    for="A fresh verification link has been sent to your email address."
                    >
                    <i>A fresh verification link has been sent to your email address.</i>
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    </label>
                <div style="text-align: center">
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <x-form.button>click here to request another</x-form.button>
                </form>
                </div>
            </x-panel>
        </main>
    </section>
</x-layout>

