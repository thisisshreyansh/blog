<div
	class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full cssmodal" id="editModal">
    <div class="bg-white ml-96 mt-32 p-6 rounded-2xl w-5/12">
	    <div >
	    	<div >
                <div>
                <span class="font-bold text-secondary uppercase">Edit Album</span>
                <button id="close-btn" class="float-end font-bold text-red-600 text-sm">X</button>
                </div>
                <form method="POST" action="" id="formaction" enctype="multipart/form-data"> 
                    @csrf
                    @method('PATCH')
                                    
                        <x-form.input name="name" value="" id=name required />
                            <div class="flex mt-6">
                                <div class="flex-1">
                                    <x-form.input name="path" type="file" id="path"/>
                                </div>
                                <img src="" id="currentimage" alt=" album cover" class="rounded-xl ml-6" width="100">
                            </div>
                
                            <x-form.field>
                                <x-form.label name="public_status"/>
                                <input  type="checkbox"  name="public_status" id="public_status">
                                {{-- {{$alb->public_status=='1' ? 'checked' : ''}}> --}}
                                <x-form.error name="public_status"/>
                            </x-form.field>
                
                        <x-form.button>Update</x-form.button>

                </form>
            </div>
        </div>
    </div>
</div>

