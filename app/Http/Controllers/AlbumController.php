<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Image;

class AlbumController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'album' => Album::latest()->paginate(9)->withQueryString()
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
            'public_status' => request('public_status')
        ]
        ));
        return redirect('admin/posts')->with('success', 'Album Created');
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
