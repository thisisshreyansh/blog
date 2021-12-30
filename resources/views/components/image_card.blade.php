@props(['img'])
<article 
    {{$attributes->merge(['class'=>'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl'])}}>
    <div class="py-6 px-5">
        <div>
            <img src="{{ asset('storage/thumbnails/' . $img->image_path) }}" alt="Blog Post illustration" class="rounded-xl">
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

                    <a href="/get/{{$img->image_path}}"
                        class="px-3 py-1"
                        style="font-size: 20px"><button class="btn btn-primary">Download Image</button>
                    </a>
                </div>
            </footer>
        </div>
    </div>
</article>