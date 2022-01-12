<div
	class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"
	id="my-sharing-modal">
    <div class="bg-white ml-96 mt-36 p-6 w-5/12">
        <span class="font-bold text-sm">Album Sharing for {{$alb->name}}</span>
        <button id="ok-shairng-btn" class="float-end font-bold text-gray-400 text-sm">X</button>
	    <div >
	    	<div >
                <form method="POST" action="/admin/posts/sharing/{{$alb->id}}" enctype="multipart/form-data">
                    @csrf

                        <x-form.input name="User" type="email" required />

                    <x-form.button>Share</x-form.button>
                </form>

            <div>
                <table>
                    <tbody>
                @foreach (App\Models\SharedWith::where('album_id','=',$alb->id)
                                     ->join('users', 'user_id', '=', 'users.id')
                                     ->get()
                                      as $su)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                            <div class="text-sm font-medium text-gray-900">
                                <a href="/posts/{{$su->id}}">
                                    {{$su->name}}
                                </a>
                            </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                            <div class="text-sm font-medium text-gray-900">
                                {{$su->email}}
                            </div>
                            </div>
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <form action="/removesharing/{{$su->id}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="text-red-500 hover:text-red-600">Delete</button>
                            
                            </form>
                        </td>
                    </tr>
              @endforeach
                    </tbody>
            </table>
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
    --}}