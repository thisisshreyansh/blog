<x-layout>
    @foreach ($posts as $post)
        <article>
            <h1>
                <a href="posts/{{$post -> slug}}">
                    {!!$post -> title!!} 
                    {{-- {{ random path }} or {!! random path !!} if you want to run scripts or html in random path use 2 if not and afraid of malcious code use first --}}
                </a>
            </h1>
            <div>
            {{$post -> excerpt}}
            </div>
        </article>
    @endforeach
</x-layout>
