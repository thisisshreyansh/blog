<?php

namespace App\Http\Controllers;

use App\Models\SharedWith;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SharedWithController extends Controller
{
    public function destroy( SharedWith $shared)
    {
        SharedWith::where('id',$shared->id)->delete();
        return back()->with('success', 'Sharing Revoked!');
    }

    public function store()
    {
        SharedWith::create([
            'user_id' => request('user_id'),
            'album_id' => request('album_id'),
        ]
        );
        return redirect('admin/posts')->with('success', 'Sharing Added');
    }

    public function index()
    {
        $sharedusers = Album::where('albums.user_id','=',Auth::id())
            ->join('shared_withs', 'albums.album_id', '=', 'shared_withs.album_id')
            ->join('users', 'shared_withs.user_id', '=', 'users.id')
            ->select('users.username', 'album_name','albums.album_id','shared_withs.id')
            ->get();

        return view('admin.posts.editsharing',['sharedusers'=>$sharedusers]);
    }

    public function sharing()
    {
        return view('admin.posts.sharing');
    }

}
