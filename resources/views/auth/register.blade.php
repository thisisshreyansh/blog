{{-- <x-layout>
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

                    <x-form.input name="name" val=" *" required />
                    <x-form.input name="username" val=" *" required />
                    <x-form.input name="email" val=" *" type="email" required />
                    <x-form.input name="password" val=" *" type="password" autocomplete="new-password" required />
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
    <div class="container" style=" height: 400px; margin-top: 40px; ">
      <div class="top-header">
        <h3>Welcome to Imagger</h3>
        <p>Enter your credentials to create your account</p>
      </div>
      <form method="POST" action="/register">
        @csrf
            <div class="user form-group">
                <i class=" bx bxs-user"></i>
                <input type="text" name="name" required="required" required/>
                <label>Name</label>
            </div>
            <div class="pass form-group">
                <i class="bx bxs-user-circle"></i>
                <input type="tetx" name="username" required="required" required/>
                <label>Username</label>
            </div>
            <div class="user form-group">
                <i class="bx bxl-gmail"></i>
                <input type="text" name="email" required="required" required/>
                <label>Email</label>
            </div>
            <div class="pass form-group">
                <i class="bx bxs-lock-alt"></i>
                <input type="password" name="password" required="required" required/>
                <label>Password</label>
            </div>
        <div class="btn">
        <button>Register Now</button>
      </div>
      @error('name')
        <p class="error">{{ $message }}</p>
        @enderror
        @error('username')
        <p class="error" >{{ $message }}</p>
        @enderror
      @error('email')
        <p class="error">{{ $message }}</p>
        @enderror
        @error('password')
        <p class="error" >{{ $message }}</p>
        @enderror
    </form>
    </div>
    <p class="last">Have a Account. Click here to <a href="/login">Login </a></p>
  </body>
</html>