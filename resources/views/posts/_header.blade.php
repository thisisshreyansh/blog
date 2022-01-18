<header>
    <div>
        <div class="flex flex-row items-center p-1 justify-between bg-white shadow-xs">
            <div class="flex flex-row mr-8 hidden md:flex ">
                <a class="bg-gray-200 hover:bg-gray-400 text-black text-sm py-2 px-4 " href={{ route('home') }}>All Albums</a>
                <a class="bg-gray-200 hover:bg-gray-400 text-black text-sm py-2 px-4 " href={{ route('myalbums') }}>My Albums</a>
                <a class="bg-gray-200 hover:bg-gray-400 text-black text-sm py-2 px-4 " href={{ route('sharedalbums') }}>Shared Albums</a>
            </div>
            <!-- Search -->
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                <form method="GET" action="#">
                    <input type="text" name="searchAlbum" id="searchAlbum"  placeholder="Search Albums"
                            class="bg-transparent placeholder-black font-semibold text-sm"
                            value="{{request('searchAlbum')}}" autocomplete="off">
                </form>
            </div>
          </div>
          <div id="searchAlbum_list" class="w-max right-8 text-secondary" style=" position: absolute; "></div>
    </div>

    <script type="text/javascript" src="{{ URL::asset('js/layout/autosuggestalbum.js') }}"></script>
</header>