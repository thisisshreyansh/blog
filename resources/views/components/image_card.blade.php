@props(['img'])
<article 
    {{$attributes->merge(['class'=>'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl'])}}>
    <div class="py-6 px-5">
        <div style="display: flex;flex-wrap: wrap;">
            <a href="{{ asset('storage/' . $img->image_path) }}" data-lightbox="{{$img->album_id}}" data-title="{{$img->image_name}}">
                <img src="{{ asset('storage/' . $img->image_path) }}" width="700px">
            </a>
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="mt-4">
                    <h1 class="text-3xl">
                        {{$img->image_name}}
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{$img->created_at->diffForHumans()}}</time>
                    </span>
                </div>
            </header>


            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        <h5 class="font-bold">
                            {{$img->author->name}}
                        </h5>
                    </div>

                    @if (auth()->user()?->can('admin')) 
                    <a href="/get/{{$img->image_path}}"
                        class="px-3 py-1"
                        style="font-size: 20px"><button class="btn btn-primary">Download Image</button>
                    </a>
                    @endif

                    @if ($img->user_id === Auth::id())
                        <form action="/posts/{{$img->album_id}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="text-red-500 hover:text-red-600">Delete</button>
                        </form>
                    @endif
                </div>
            </footer>
        </div>
    </div>
</article>