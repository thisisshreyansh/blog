@props(['alb'])

<div class="ml-10 mr-10">
    <div class="w-full flex justify-between p-3">
      <div class="flex">
        <div class="rounded-full h-8 w-8 bg-gray-500 flex items-center justify-center overflow-hidden">
            <img src="/images/lary-avatar.svg" alt="Lary avatar">
        </div>
        <span class="pt-1 ml-2 font-bold text-sm">{{$alb->author->name}}</span>
      </div>
     
      <div class="dropdown">
        <button  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-ellipsis-h pt-2 text-lg"></i>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            @if ($alb->user_id === Auth::id())
              <li>    
                  <form action="delete/album/{{$alb->id}}" method="POST">
                  @csrf
                  @method('DELETE')

                    <button type="submit" style="font-size: 12px"  class="text-red-500 hover:text-red-600 dropdown-item  show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                  </form>
              </li>
              <li><button class="dropdown-item open-album" style="font-size: 12px" 
                data-toggle="modal" data-target="#editModal" 
                data-album-id="{{$alb->id}}" data-album-name="{{$alb->name}}" data-album-path="{{ asset('storage/public/album/'.$alb->id.'/'. $alb->path) }}" data-album-publicstatus="{{$alb->public_status}}"
                >Edit</button></li>
              <li><button class="dropdown-item open-share-btn" style="font-size: 12px"
                data-share-id="{{$alb->id}}" data-toggle="modal" data-share-target="#shareModal" 
                >Share</button></li>
            @endif
            <li><a class="dropdown-item" style="font-size: 12px" href="{{route('downloadAlbum',$alb->id)}}">Download</a></li>
            
            
        </ul>
      </div>

    </div>

    
    <a href="{{ route('showalbum',$alb->id) }}">
    <img class="w-full bg-cover" src="{{ asset('storage/public/album/'.$alb->id.'/'. $alb->path) }}">
    </a>
    <div class="px-3 pb-2" style="padding: 10px;">
      <div class="mb-2" style="text-align: -webkit-center;">
        <div class="mb-2 text-sm ">
            <a href="/albums/{{$alb->id}}" style="text-decoration: none; color:black;">
                <span class="font-medium mr-2 text-capitalize"
                    style=" font-size: 24px; font-weight: bold; ">
                    {{$alb->name}}
                </span>
            </a>
        </div>
      </div>
    </div>
  </div>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
 
  $('.show_confirm').click(function(event) {
       var form =  $(this).closest("form");
       var name = $(this).data("name");
       event.preventDefault();
       swal({
           title: `Are you sure you want to delete this record?`,
           text: "If you delete this, it will be gone forever.",
           icon: "warning",
           buttons: true,
           dangerMode: true,
       })
       .then((willDelete) => {
         if (willDelete) {
           form.submit();
         }
       });
   });

</script>
