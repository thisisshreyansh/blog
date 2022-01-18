<x-layout>
    <section class="px-0 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-10 space-y-6">
            <article class="max-w-4xl mx-auto gap-x-10">
                
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

                            Back to Home
                        </a>

                    </div>
                    
                    <div>
                        <div style="display: flex;
                        justify-content: space-between;">
                            <h1 class="font-bold lg:text-4xl mb-10 text-3xl text-capitalize">
                                {{$album->name}}
                            </h1>
                            
                            <a href="{{route('downloadAlbum',['id'=>$album->id])}}"
                                class="px-3 py-1"
                                style="font-size: 20px"><button><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" color="black" class="bi bi-download" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                  </svg></button>
                            </a>
                        </div>
                        <div class="flex">
                            <p class="font-bold pr-4 text-capitalize text-secondary"><img class="radio-lg" src="/images/lary-avatar.svg" alt="Lary avatar"></p>
                            <p class="font-bold pr-4 text-capitalize text-secondary">{{$album->author->name}}</p>
                            <p class="text-gray-400 pt-2 text-xs">
                                Published <time>{{$album->created_at->diffForHumans()}}</time>
                            </p>

                           <!-- Search-->
                            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                                <form method="GET" action="#">
                                    <input type="text" name="searchImage" id="country"  placeholder="Search Image"
                                            class="bg-transparent placeholder-black font-semibold text-sm"
                                            value="{{request('searchImage')}}" autocomplete="off">
                                </form>
                            </div> 
                            <div id="searchImage_list" class="w-max right-8 text-secondary" style=" position: absolute; "></div>

                        </div>
                    </div>
                </div>

                @if ($image->count())
                    <div style="display: flex; flex-wrap: wrap; justify-content: space-around;">
                        @foreach ($image as $img) 
                            @if ($album->id == $img->album_id)
                                    <x-image_card 
                                        :img="$img" 
                                    />   
                            @endif            
                        @endforeach

                        
                    </div>
                    {{ $image->links() }}
        
                @else
                    <p class="text-center pt-20">No Image In Album Please Check Back Later</p>
                @endif
                
            </article>
        </main>
    </section>
    <button class="bg-red-400 fixed-bottom font-bold m-10 p-3.5 rounded-full shadow" id="addimage"><i class="fa fa-plus" aria-hidden="true"></i></button>
    @include('components.modal.newimage')
</x-layout>

<script type="text/javascript">
    $(document).ready(function () {
        $('#searchImage').on('keyup',function() {
            var query = $(this).val(); 
            $.ajax({
                url:"{{ route('searchImage') }}",
                type:"GET",
                data:{'name':query},
                success:function (data) {
                    $('#searchImage_list').html(data);
                }
            })
            // end of ajax call
        });

        
        $(document).on('click', 'li', function(){
            var value = $(this).text();
            $('#searchImage').val(value);
            $('#searchImage_list').html("");
        });
    });
</script>

<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>