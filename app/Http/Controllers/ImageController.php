<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ImageController extends Controller
{
    public function index()
    {
        return view('posts.image', [
            'image' => Image::latest()
            ]);
    }

    public function show()
    {
        return view('admin.posts.image');
    }

    public function destroy( Image $image)
    {
        $image->where('image_id',$image->image_id)->delete();

        return back()->with('success', 'Image Deleted!');
    }

    public function store()
    {
        Image::create(array_merge($this->validatePost(), [
            'image_name' => request('image_name'),
            'image_path' => request()->file('image_path')->store('thumbnails'),
            'user_id' => request()->user()->id,
            'album_id' => request('album_id'),
        ]
        ));
        return redirect('admin/posts')->with('success', 'Image Added');
    }

    protected function validatePost(?Image $image= null): array
    {
        $image ??= new Image();

        return request()->validate([
            'image_name' => 'required',
            'image_path' => ['required', 'image'],
            'album_id' => ['required', Rule::exists('albums', 'album_id')]
        ]);
    }
}
