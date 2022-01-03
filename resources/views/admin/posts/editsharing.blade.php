<x-layout>
    <x-setting heading="Manage Posts">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <tbody class="bg-white divide-y divide-gray-200">
                      @foreach (DB::table("shared_withs s, albums a, users u")
                      ->where("s.album_id", "=", Album::album_id())
                      ->where("s.user_id", "=", User::id())
                      ->where("a.user_id", "=", Auth::id()) as $shared)
                        {{-- @if (\App\Models\Album::all()->user_id !== Auth::id()) --}}
                            {{-- @if ($shared->album_id === \App\Models\Album::all()->album_id) --}}
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900">
                                        <a href="/posts/{{$shared->album_id}}">
                                            {{$shared->album_name}}
                                        </a>
                                    </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{\App\Models\User::all()->name}}
                                    </div>
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <form action="/admin/posts/{{$album->album_id}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="text-red-500 hover:text-red-600">Delete</button>
                                    
                                    </form>
                                </td>
                            </tr>
                            {{-- @endif
                        @endif --}}
                          @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </x-setting>
</x-layout>
