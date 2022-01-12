@props(['img'])
<div style="
padding-bottom: 10px;
padding-top: 10px;
">
    <div style="display: flex;flex-wrap: wrap;">
        <a href={{ asset('storage/public/album/'.$img->album_id.'/images'.'/'. $img->path) }} data-lightbox="{{$img->album_id}}" data-title="{{$img->name}}">
        <img class="w-60 bg-cover" src="{{ asset('storage/public/album/'.$img->album_id.'/thumbnails'.'/'. $img->thumbnails) }}">
        </a>
    </div>
    {{-- <div class="px-3 pb-2" style="padding: 10px;">
      <div class="mb-2" style="text-align: -webkit-center;">
        <div class="mb-2 text-sm ">
            <span class="font-medium mr-2 text-capitalize"
                style=" font-size: 24px; font-weight: bold; ">
                {{$img->name}}
            </span>
        </div>
      </div>
    </div> --}}

    <div class="w-full flex justify-between">
 
        <div class="dropdown">
            <button  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-ellipsis-h pt-2 text-lg"></i>
            </button>
            
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                    @if ($img->user_id === Auth::id())
                    <form action="/posts/{{$img->album_id}}"
                    method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="text-red-500 hover:text-red-600 dropdown-item" style="font-size: 12px">Delete</button>
                    
                    </form>
                    @endif
                </li>
                @if (auth()->user()?->can('admin')) 
                    <li>
                        <a href="{{route('downloadFile',$img->path)}}"
                        class="px-3 py-1 dropdown-item" style="font-size: 12px">
                            Download Image
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
