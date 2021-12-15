
<x-layout>
   
    @include('_post-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            {{-- <x-posts-grid :posts = '$posts' /> --}}
            <x-post-featured-card :post="$posts[0]" />

            @if ($posts->count()>1)
                <div class="lg:grid lg:grid-cols-6">
                    @foreach ($posts->skip(1) as $post) <!-- skip index is (i+1) as index start from 0 skip from 1-->
                        <x-post_card 
                            :post="$post" 
                            class=" {{$loop->iteration<3 ? 'col-span-3':'col-span-2'}}"
                        />                
                        <!--loop variable is provide by default in php foreach loop its our choice to use it try dd()"die,dump" or ddd()"die,dump,debug" with any var to check properties-->
                    @endforeach
                </div>
            @endif
        @else
            <p class="text-center">No Post Yet PLease Check Back Later</p>
        @endif

    </main>

</x-layout>
