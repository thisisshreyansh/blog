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
        $sharedusers = Album::join('shared_withs', 'albums.album_id', '=', 'shared_withs.album_id')
            ->where('shared_withs.user_id', '=', Auth::id())
            ->filter(
                request(['search'])
                )
            ->get();

        return view('posts.index', [
            'album' => Album::latest()
            ->filter(
                request(['search'])
                )
                ->paginate(9)->withQueryString(),
            'shared' => $sharedusers
            ]);
    }

    public function adminindex()
    {
        return view('admin.posts.index', [
            'posts' => Album::paginate(50)
        ]);
    }

    public function show(Album $album , Image $image)
    {
        return view('posts.image', [
            'album' => $album,
            'image' => $image
        ]);
    }

    public function album()
    {
        return view('admin.posts.album');
    }

    public function store()
    {
        Album::create(array_merge($this->validatePost(), [
            'album_name' => request('album_name'),
            'album_cover' => request()->file('album_cover')->store('thumbnails'),
            'user_id' => request()->user()->id,
            'public_status' => request()->has('public_status')
        ]
        ));
        return redirect('admin/posts')->with('success', 'Album Created');
    }

    public function edit(Album $album)
    {
        return view('admin.posts.albumedit', 
        [
            'album' => $album
        ]);
    }

    public function update(Album $album)
    {
        $attributes = request()->validate([
            'album_name' => 'required',
            'album_cover' => 'image',
        ]);

        $attributes['public_status'] = request()->has('public_status');

        if ($attributes['album_cover'] ?? false) {
            $attributes['album_cover'] = request()->file('album_cover')->store('thumbnails');
        }

        $album->update($attributes);
        back()->with('success', 'Album Updated!');
        
        return redirect('/admin/posts');
        
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
            'album_name' => 'required',
            'album_cover' => $album->exists ? ['image'] : ['required', 'image'],
        ]);
    }

}
