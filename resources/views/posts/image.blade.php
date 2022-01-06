<x-layout>
    <section class="px-0 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-10 space-y-6">
            <article class="max-w-4xl mx-auto gap-x-10">
                
                <div class="col-span-4 lg:text-center lg:pt-5 mb-10">  
                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time>{{$album->created_at->diffForHumans()}}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">
                                <a href="/?authors={{$album->author->username}}">
                                    {{$album->author->name}}
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Posts
                        </a>

                        {{-- <div class="space-x-1">
                            <x-category-button :category="$post->category"/>
                        </div> --}}
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{$album->album_name}}
                    </h1>
                    <img src= "{{ asset('storage/public/' .$album->album_cover) }}" alt="Images corresponding to album" class="rounded-xl" width="40%">

                    <a href="{{route('downloadAlbum',$album->album_id)}}"
                        class="px-3 py-1"
                        style="font-size: 20px"><button class="btn btn-primary">Download Album</button>
                    </a>
                </div>

                {{-- <section class="col-span-8 col-start-5 mt-10 space-y-6"> --}}
                @if ($image->count())
            
                    <div style="display:flex ">
                        @foreach ($image::all() as $img) 
                            @if ($album->album_id == $img->album_id)
                                {{-- @if ($img->user_id == Auth::id()) --}}
                                    <x-image_card 
                                        :img="$img" 
                                        class="col-span-2"
                                    />   
                                {{-- @endif     --}}
                            @endif            
                        @endforeach
                    </div>
            
                    {{-- {{ $image->links() }}   --}}
                @else
                    <p class="text-center">No Image In Album Please Check Back Later</p>
                @endif
                {{-- </section> --}}
            </article>
        </main>
    </section>
</x-layout>