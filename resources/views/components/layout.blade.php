<!doctype html>
<head>
    <title>Laravel From Scratch Blog</title>


    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@1.20.0/dist/full.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2/dist/tailwind.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{asset('lightbox.min.css')}}" type="text/css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    <script type="text/javascript" src="{{asset('lightbox-plus-jquery.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.11.0/jquery.typeahead.min.js" integrity="sha512-Rc24PGD2NTEGNYG/EMB+jcFpAltU9svgPcG/73l1/5M6is6gu3Vo1uVqyaNWf/sXfKyI0l240iwX9wpm6HE/Tg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.11.0/jquery.typeahead.js" integrity="sha512-hIaMZEgNK4DTnrqBvp0sV7bUhmT8hfbhT+6RQ3YX5e3x25xaH5W1kLi4KLAy16gKiebweip2Ng1udOYHSkBMBw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="https://images.all-free-download.com/images/graphiclarge/android_gallery_logo_6830698.jpg" alt="Home page logo" width="90" height="30">
                </a>
            </div>
            <div>
                <h6 class="font-medium font-serif shadow-xl text-4xl">
                    Your Albums
                </h6>
            </div>
            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                    <x-dropdown>
                        <x-slot name="triggers">
                            <button class="text-xs font-bold uppercase">
                                Welcome, {{ auth()->user()->name }}!
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
                            <x-dropdown-item href="/admin/posts/image" :active="request()->is('/admin/posts/image')">
                                New Image
                            </x-dropdown-item>

                            <x-dropdown-item href="/admin/posts/album" :active="request()->is('/admin/posts/album')">
                                New Album
                            </x-dropdown-item>

                            <x-dropdown-item href="/admin/posts" :active="request()->is('/admin/posts')">
                                Dashboard
                            </x-dropdown-item>
                        @endif
                        <form id="logout-form" method="POST" action="/logout" class="hidden">
                            @csrf
                        </form>
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

        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>
        </footer>
    </section>
    <x-flash/>
    
</body>
