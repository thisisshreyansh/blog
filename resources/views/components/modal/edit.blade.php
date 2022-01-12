<div
	class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"
	id="my-modal">
    <div class="bg-white ml-96 mt-36 p-6 w-5/12">
	    <div >
	    	<div >
                <div>
                <span class="font-bold text-secondary uppercase">{{$alb->name}}</span>
                <button id="ok-btn" class="float-end font-bold text-red-600 text-sm">X</button>
                </div>
                <form method="POST" action="/admin/posts/{{$alb->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                                    
                                    <x-form.input name="name" :value="old('name',$alb->name)" required />
                                        <div class="flex mt-6">
                                            <div class="flex-1">
                                                <x-form.input name="path" type="file" :value="old('path',$alb->path)" />
                                            </div>
                                            <img src="{{ asset('storage/public/album/'.$alb->id.'/'. $alb->path) }}" alt=" album cover" class="rounded-xl ml-6" width="100">
                                        </div>
                            
                                        <x-form.field>
                                            <x-form.label name="public_status"/>
                                            <input 
                                            type="checkbox" 
                                            name="public_status" 
                                            id="public_status"
                                            {{$alb->public_status=='1' ? 'checked' : ''}}>
                                            <x-form.error name="public_status"/>
                                        </x-form.field>
                            
                                    <x-form.button>Update</x-form.button>

                </form>
            </div>
        </div>
    </div>
</div>

