<div
	class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full cssmodal"
	id="my-image-modal">
    <div class="bg-white ml-96 mt-36 p-6 rounded-2xl w-5/12">
	    <div >
	    	<div >
                <div>
                <span class="font-bold text-secondary uppercase">Add Images to {{$album->name}}</span>
                <button id="ok-image-btn" class="float-end font-bold text-red-600 text-lg">X</button>
                </div>
                <form method="POST" action={{ route('storeimage', $album->id) }} enctype="multipart/form-data">
                    @csrf
        
                    <x-form.input name="name" required />
                    <x-form.input name="path" type="file" required />
        
                    <x-form.button>Add Image</x-form.button>
                </form>
            </div>
        </div>
    </div>
</div>

