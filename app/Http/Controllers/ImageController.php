<?php

namespace App\Http\Controllers;

// use App\Models\Image;
use Intervention\Image\Facades\Image as Images;
use App\Models\Image;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManagerStatic;

class ImageController extends Controller
{
    public function index( ) 
    {
        return view('posts.image',[
            'image' => Image::latest(),
        ]);
    }

    public function show()
    {
        return view('admin.posts.image');
    }

    public function destroy( Image $image)
    {
        $image->where('id',$image->id)->delete();

        return back()->with('success', 'Image Deleted!');
    }

    public function store(Request $request,Album $album)
    {
        // dd($album->id);
        // $this->validatePost();
            
            $image_name = request('name');
            $user_id = request()->user()->id;
            $album_id = request('album_id');
            $album_id = $album->id;
            $image_path = $request->file('path')->store('album/'.$album_id.'/images');

            if (!file_exists(public_path().'/storage/public/album/'.$album_id.'/thumbnails')) {
                mkdir(public_path().'/storage/public/album/'.$album_id.'/thumbnails', 0777, true);
            }
            Images::make(public_path().'/storage/public/'.$image_path)
                            ->resize(500,500)
                            ->save(public_path().'/storage/public/album/'.$album_id.'/thumbnails'.'/'.substr($image_path,-44));
            
            $save = new Image;
            $save->thumbnails = substr($image_path,-44);
            $save->name = $image_name;
            $save->user_id = $user_id;
            $save->album_id = $album_id;
            $save->path = substr($image_path,-44);
            $save->save();
            
            

        return back()->with('success', 'Image Added');
    }

    protected function validatePost(?Image $image= null): array
    {
        $image ??= new Image();

        return request()->validate([
            'name' => 'required',
            'path' => ['required', 'image'],
            'album_id' => ['required', Rule::exists('albums', 'id')]
        ]);
    }
}
