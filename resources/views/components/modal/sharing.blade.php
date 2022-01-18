<link href="{{ URL::asset('css/modals/sharing.css') }}" type="text/css" rel="stylesheet">
<div
	class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 h-full w-full cssmodal"
	id="shareModal">
    <div class="bg-white ml-96 mt-36 p-6  rounded-2xl w-5/12">
        <div>
            <span class="font-bold text-secondary uppercase">Share Album</span>
            <button id="close-shairng-btn" class="float-end font-bold text-red-600 text-sm">X</button>
        </div>
        
	    <div >
	    	<div >
                <form method="POST" action="" enctype="multipart/form-data" id="formshareaction">
                    @csrf
                        <x-form.input name="User" type="email" required />
                    
                
        <div class="sharedpersonslist mt-4 max-h-24 scrollbar scrollbar-primary">
            <div class="force-overflow">
                <ul class="sharingdata" >
                    
                </ul>
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

            </div></div>
                <div style="  text-align: right; ">
                    <x-form.button>Share</x-form.button>
                </div>
            </form>
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