<div
	class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"
	id="my-album-modal">
    <div class="bg-white ml-96 mt-36 p-6 w-5/12">
	    <div >
	    	<div >
                <div>
                <span class="font-bold text-secondary uppercase">Add New Album</span>
                <button id="ok-album-btn" class="float-end font-bold text-red-600 text-lg">X</button>
                </div>
                    <form method="POST" action="{{ route('createalbum') }}" enctype="multipart/form-data">
                        @csrf
            
                        <x-form.input name="name" required />
                        <x-form.input name="path" type="file" required />
            
                        <x-form.field>
                            <x-form.label name="public_status"/>
                            <input type="checkbox" name="public_status" value="public_status">
                            <x-form.error name="public_status"/>
                        </x-form.field>
            
                        <x-form.button>Create</x-form.button>
                    </form>
            </div>
        </div>
    </div>
</div>

