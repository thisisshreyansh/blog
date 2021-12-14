<x-layout>
    {{-- @foreach ($posts as $post) --}}
        {{-- <article> --}}
            {{-- <h1> --}}
                 
                {{-- <a href="posts/{{$post -> slug}}"> --}}
                    {{-- {!!$post -> title!!}  --}}
                    {{-- {{ random path }} or {!! random path !!} if you want to run scripts or html in random path use 2 if not and afraid of malcious code use first --}}
                {{-- </a> --}}
            {{-- </h1> --}}
            {{-- <p> --}}
                {{-- By <a href="/authors/{{$post->author->username}}">{{ $post->author->name }}</a> in --}}
                {{-- <a href="/categories/{{ $post->category->slug }}">{{$post->category->name}}</a> --}}
            {{-- </p> --}}
            {{-- <div> --}}
            {{-- {{$post -> excerpt}} --}}
            {{-- </div> --}}
        {{-- </article> --}}
    {{-- @endforeach --}}
    
    @include('_post-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-post-featured-card :post="$posts[0]" />

            <div class="lg:grid lg:grid-cols-2">
                @foreach ($posts->skip(1) as $post) <!-- skip index is (i+1) as index start from 0 skip from 1-->
                    <x-post_card :post="$post"/>                
                @endforeach
            </div>
        @else
            <p class="text-center">No Post Yet PLease Check Back Later</p>
        @endif

    </main>

</x-layout>
