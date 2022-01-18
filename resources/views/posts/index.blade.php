
<x-layout>
   
    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($album->count())            
            
                <div class="lg:grid lg:grid-cols-2">
                    @foreach ($album as $alb) 
                        @if ($alb->public_status != 0 || $alb->user_id == Auth::id()) 
                            <x-post_card 
                                :alb="$alb"
                            />
                        @endif
                    @endforeach

                    @foreach ($shared as $alb) 
                        @if ($alb->public_status != 1 || $alb->user_id != Auth::id())
                            <x-post_card 
                                :alb="$alb"
                            />    
                        @endif
                    @endforeach
                </div>
                    
            {{ $album->links() }}  
        @else
            <p class="text-center">No Album In Gallery Please Check Back Later</p>
        @endif

    </main>
    <button class="bg-blue-400 fixed-bottom font-bold m-10 p-3.5 rounded-full shadow" id="addalbum"><i class="fa fa-plus" aria-hidden="true"></i></button>
</x-layout>
<script type="text/javascript" src="{{ URL::asset('css/modals/sharing.js') }}"></script>