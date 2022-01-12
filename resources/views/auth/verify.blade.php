<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Verify Your Email Address!</h1>

                    <label class="block font-semibold mb-2 text-center text-xs"
                    for="A fresh verification link has been sent to your email address."
                    >
                        <br/>
                        <br/>
                        Please check your mail to verify and confirm your registration.
                    </label>
                <div style="text-align: center">
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <x-form.button>Resend Mail</x-form.button>
                </form>
                </div>
            </x-panel>
        </main>
    </section>
</x-layout>

