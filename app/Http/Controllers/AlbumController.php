<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Image;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    private $conn;

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    public function index()
    {
        $sharedusers = Album::join('shared_withs', 'albums.id', '=', 'shared_withs.album_id')
            ->where('shared_withs.user_id', '=', Auth::id())
            ->filter(
                request(['searchAlbum'])
                )
            ->get();

        return view('posts.index', [
            'album' => Album::latest()
            ->filter(
                request(['searchAlbum'])
                )
                ->paginate(10)->withQueryString(),
            'shared' => $sharedusers
            ]);
    }

    public function show(Album $album , Image $image)
    {
        return view('posts.image', [
            'album' => $album,
            'image' => Image::where('album_id','=',$album->id)
                        ->paginate(9)->withQueryString(),
            // 'searchimage'=> Image::filter(request(['searchImage']))
        ]);
    }

    public function store(Request $request)
    {
        $album = Album::create(array_merge($this->validatePost(), [
            'name' => request('name'),
            'user_id' => request()->user()->id,
            'public_status' => request()->has('public_status')
        ]
        ));
    
        $album['path'] = request()->file('path')->storeAs('album/'.$album->id , $album['name'].'.png');
        $album['path'] = $album['name'].'.png';
        $album->update();        
        return back()->with('success', 'Album Created');
    }

    public function update(Album $album)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'path' => 'image',
        ]);

        $attributes['public_status'] = request()->has('public_status');

        if ($attributes['path'] ?? false) {
            $attributes['path'] = request()->file('path')->storeAs('album/'.$album->id , $attributes['name'].'.png');
            $attributes['path'] = $attributes['name'].'.png';
        }

        $album->update($attributes);
        
        return back()->with('success', 'Album Updated!');
        
    }

    public function destroy(Album $album , Image $image)
    {
        $image->where('album_id',$image->album_id)->delete();
        $album->delete();
        return back()->with('success', 'Album Deleted!');
    }

    protected function validatePost(?Album $album = null): array
    {
        $album ??= new Album();

        return request()->validate([
            'name' => 'required',
            'path' => $album->exists ? ['image'] : ['required', 'image'],
        ]);
    }

    public function myalbums()
    {
        return view('posts.myalbums', [
            'myalbum' => Album::where('user_id', '=', Auth::id())
            ->filter(
                request(['searchAlbum'])
                )
                ->paginate(6)->withQueryString(),
            ]);
    }

    public function sharedalbums()
    {

        return view('posts.sharedalbums', [
            'album' => Album::latest()
            ->filter(
                request(['searchAlbum'])
                )
                ->paginate(10)->withQueryString(),
            'shared' => Album::join('shared_withs', 'albums.id', '=', 'shared_withs.album_id')
            ->join('users', 'albums.user_id', '=', 'users.id')
            ->where('shared_withs.user_id', '=', Auth::id())->paginate(6)->withQueryString()
            ]);
    }

    public function searchAlbum(Request $request){
        
        if($request->ajax()) {
          
            $data = Album::where('name', 'LIKE', $request->name.'%')
                ->get();
           
            $output = '';
           
            if (count($data)>0) {
              
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
              
                foreach ($data as $row){
                   
                    $output .= '<li class="list-group-item">'.$row->name.'</li>';
                }
              
                $output .= '</ul>';
            }
            else {
             
                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }
           
            return $output;
        }
    }
}
