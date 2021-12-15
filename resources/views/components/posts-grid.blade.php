{{-- @props('posts')

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
@endif --}}