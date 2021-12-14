<x-layout>
    <h1>
        {!!$post -> title!!}
    </h1>
    <p>
        By <a href="#">Jeffery way</a> in 
        <a href="/categories/{{ $post->category->slug }}">
            {{$post->category->name}}
        </a>
    </p>
    <div>
    {!! $post -> body !!}
    </div>
    <a href="/">BACK</a>
</x-layout>