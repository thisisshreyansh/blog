<x-layout>
    <h1>
        {!!$post -> title!!}
    </h1>
    <div>
    {!! $post -> body !!}
    </div>
    <a href="/">BACK</a>
</x-layout>