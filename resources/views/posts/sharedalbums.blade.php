<x-layout>
   
    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        {{-- {{dd($shared->count());}} --}}
        @if ($shared->count())
        
                <div class="lg:grid lg:grid-cols-2">
                    @foreach ($shared as $alb) 
                            <x-sharedalbum 
                                :alb="$alb"
                            />    
                        @endforeach
                </div>
                {{ $shared->links() }}  
        @else
            <p class="text-center">No Shared Album In Gallery Please Check Back Later</p>
        @endif

    </main>

</x-layout>