
<x-layout>
   
    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($album->count())            
            
                <div class="lg:grid lg:grid-cols-6">
                    @foreach ($album as $alb) 
                        @if ($alb->public_status != 0) 
                            <x-post_card 
                                :alb="$alb" 
                                class=" {{$loop->iteration<3 ? 'col-span-3':'col-span-2'}}"
                            />    
                        @elseif ($alb->user_id == Auth::id()) 
                            <x-post_card 
                                :alb="$alb" 
                                class=" {{$loop->iteration<3 ? 'col-span-3':'col-span-2'}}"
                            />             
                        @endif
                     @endforeach
                </div>
                    
            {{ $album->links() }}  
        @else
            <p class="text-center">No Album In Gallery Please Check Back Later</p>
        @endif

    </main>

</x-layout>
