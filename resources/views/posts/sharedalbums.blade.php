<x-layout>
   
    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        {{-- {{dd($shared->count())}} --}}
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
    <button class="bg-red-400 fixed-bottom font-bold m-10 p-3.5 rounded-full shadow" id="addalbum"><i class="fa fa-plus" aria-hidden="true"></i></button>
</x-layout>