<x-layout>
   
    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($myalbum->count())      
                <div class="lg:grid lg:grid-cols-2">
                    @foreach ($myalbum as $alb) 
                        @if ($alb->user_id == Auth::id()) 
                            <x-post_card 
                                :alb="$alb"
                            />
                            @include('components.modal.edit')
                            @include('components.modal.sharing')
                        @endif
                    @endforeach
                </div>
            {{ $myalbum->links() }}  
        @else
            <p class="text-center">No Album In Gallery Please Check Back Later</p>
        @endif

    </main>

</x-layout>