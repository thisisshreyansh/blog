@props(['alb'])

<div class="ml-10 mr-10">
    <div class="w-full flex justify-between p-3">
      <div class="flex">
        <div class="rounded-full h-8 w-8 bg-gray-500 flex items-center justify-center overflow-hidden">
            <img src="/images/lary-avatar.svg" alt="Lary avatar">
        </div>
        
        <span class="pt-1 ml-2 font-bold text-sm">{{$alb->username}}</span>
      </div>
     
      <div class="dropdown">
        <button  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-ellipsis-h pt-2 text-lg"></i>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" style="font-size: 12px" href="{{route('downloadAlbum',$alb->album_id)}}">Download</a></li>
        </ul>
      </div>
      
    </div>
    <a href="/albums/{{$alb->album_id}}">
    <img class="w-full bg-cover" src="{{ asset('storage/public/album/'.$alb->album_id.'/'. $alb->path) }}">
    </a>
    <div class="px-3 pb-2" style="padding: 10px;">
      <div class="mb-2" style="text-align: -webkit-center;">
        <div class="mb-2 text-sm ">
            <a href="/albums/{{$alb->album_id}}" style="text-decoration: none; color:black;">
                <span class="font-medium mr-2 text-capitalize"
                    style=" font-size: 24px; font-weight: bold; ">
                    {{$alb->name}}
                </span>
            </a>
        </div>
      </div>
    </div>
  </div>

