
{{-- <x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Log In!</h1>

                <form method="POST" action="{{ route('login') }}" class="mt-10">
                    @csrf

                    <x-form.input name="email" type="email" autocomplete="username" required />
                    <x-form.input name="password" type="password" autocomplete="current-password" required />
                    @if (Route::has('password.request'))
                        <a href="{{ route('forget.password.get') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    <x-form.button>Log In</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout> --}}

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
      rel="stylesheet"
    />
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> --}}
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap"
      rel="stylesheet"
    />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link href="{{ URL::asset('css/login/style.css') }}" type="text/css" rel="stylesheet">
 </head>
  <body>
    <div style="text-align: -webkit-center">
        <a href="/">
            <img src="../images/Imagger.png" alt="Home page logo" width="150">
        </a>
    </div>
    <div class="container" style="margin-top: 71px;">
      <div class="top-header">
        <h3>Welcome back</h3>
        <p>Enter your credentials to access your account</p>
      </div>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="user">
            <i class="bx bxl-gmail"></i>
            <input type="text" name="email" placeholder="Enter your email" style="font-size: x-small;"/>
           
          </div>
          <div class="pass">
            <i class="bx bxs-lock-alt"></i>
            <input type="password" name="password" placeholder="Enter your password" style="font-size: x-small;"/>
            
          </div>
        <div class="btn">
        <button>Sign in</button>
      </div>
      @error('email')
        <p class="error">{{ $message }}</p>
        @enderror
        @error('password')
        <p class="error" >{{ $message }}</p>
        @enderror
    </form>
    </div>
    <p class="last">Forgot your password? <a href="{{ route('forget.password.get') }}"> Reset Password </a></p>
    <p class="last">New here. Click <a href="/register">Register </a></p>
  </body>
</html>
