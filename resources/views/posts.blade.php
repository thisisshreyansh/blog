<x-layout>
    @foreach ($posts as $post)
        <article>
            <h1>
                 
                <a href="posts/{{$post -> slug}}">
                    {!!$post -> title!!} 
                    {{-- {{ random path }} or {!! random path !!} if you want to run scripts or html in random path use 2 if not and afraid of malcious code use first --}}
                </a>
            </h1>
            <p>
                By <a href="/authors/{{$post->author->username}}">{{ $post->author->name }}</a> in
                <a href="/categories/{{ $post->category->slug }}">{{$post->category->name}}</a>
            </p>
            <div>
            {{$post -> excerpt}}
            </div>
        </article>
    @endforeach
</x-layout>
