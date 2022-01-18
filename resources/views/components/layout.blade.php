<!doctype html>
<head>
    <title>Laravel From Scratch Blog</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@1.20.0/dist/full.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2/dist/tailwind.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{asset('lightbox.min.css')}}" type="text/css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    <script type="text/javascript" src="{{asset('lightbox-plus-jquery.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />
    <link href="{{ URL::asset('css/layout/layout.css') }}" type="text/css" rel="stylesheet">
    <style>
        a{
            text-decoration: none; 
            color:black;
        }
    </style>
</head>

<body style="font-family: Open Sans, sans-serif">

    <section class="px-6 py-3">
        <nav class="md:flex md:justify-between md:items-center" style="border-bottom-color: rgb(0, 0, 0)">
            <div>
                <a href="/">
                    <img src="../images/Imagger.png" alt="Home page logo" width="120">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                    <x-dropdown>
                        <x-slot name="triggers">
                            <button class="text-xs font-bold uppercase">
                                Welcome, {{ auth()->user()->name }}!  <i class="fas fa-chevron-down"></i>
                            </button>
                        </x-slot>

                        <x-dropdown-item
                            href="#"
                            x-data="{}"
                            @click.prevent="document.querySelector('#logout-form').submit()"
                        >
                            Log Out
                        </x-dropdown-item>

                        @if (auth()->user()?->can('admin'))                        
                            <x-dropdown-item href="/">
                               All Albums
                            </x-dropdown-item>

                            <x-dropdown-item href="/albums/owned">
                                My Albums
                            </x-dropdown-item>

                            <x-dropdown-item href="/albums/shared">
                                Shared With Me
                            </x-dropdown-item>
                        @endif

                        <form id="logout-form" method="POST" action="/logout" class="hidden">
                            @csrf
                        </form>

                        @if (!Auth::user()->hasVerifiedEmail())
                            <x-dropdown-item href="#"
                            x-data="{}"
                            @click.prevent="document.querySelector('#verify').submit()">
                                Verify Email
                            </x-dropdown-item>
                            <form class="hidden" id="verify" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                            </form>
                        @endif

                    </x-dropdown>
                @else
                    <a href="/register"
                       class="text-xs font-bold uppercase {{ request()->is('register') ? 'text-blue-500' : '' }}">
                        Register
                    </a>

                    <a href="/login"
                       class="ml-6 text-xs font-bold uppercase {{ request()->is('login') ? 'text-blue-500' : '' }}">
                        Log In
                    </a>
                @endauth

                
            </div>
        </nav>

        {{$slot}}

    </section>
    <x-flash/>

    @include('components.modal.newalbum')
    @include('components.modal.edit')
    @include('components.modal.sharing')
</body>

<script type="text/javascript" src="{{ URL::asset('css/modals/editalbum.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('css/modals/sharing.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/layout/addalbum.js') }}"></script>

{{-- ajax will be called on update click --}}
    