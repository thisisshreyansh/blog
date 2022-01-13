<div
	class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"
	id="shareModal">
    <div class="bg-white ml-96 mt-36 p-6 w-5/12">
        <div>
            <span class="font-bold text-secondary uppercase">Share Album</span>
            <button id="close-shairng-btn" class="float-end font-bold text-red-600 text-sm">X</button>
        </div>
        
	    <div >
	    	<div >
                <form method="POST" action="" enctype="multipart/form-data" id="formshareaction">
                    @csrf
                        <x-form.input name="User" type="email" required />
                    <x-form.button>Share</x-form.button>
                </form>

            <div class="sharedpersonslist">

                {{-- @foreach (App\Models\SharedWith::where('album_id','=',$alb->id) 
                ->join('users', 'user_id', '=', 'users.id')->get()
                                      as $su)
                            <div class="flex items-center">
                                <div class="text-sm font-medium text-gray-900">
                                    {{$su->name}} 
                                </div>
                            </div>


                            <div class="flex items-center">
                                <div class="text-sm font-medium text-gray-900">
                                   {{$su->email}}
                                </div>
                            </div>

                            <div>
                                <form action="/removesharing/{{$su->id}}" method="POST">
                                    @csrf
                                    @method('DELETE') 
                                    <button class="text-red-500 hover:text-red-600">Delete</button>
                                </form>
                            </div>
                @endforeach --}}

            </div>
            </div>
        </div>
    </div>
</div>

{{-- 
    flex
    div 
    scroll

    spacing under heading
    font size for heading

    place holder for sharing input

    share button at bottom right

    sharing api for calling shared person
    --}}