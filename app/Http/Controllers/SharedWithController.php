<?php

namespace App\Http\Controllers;

use App\Models\SharedWith;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class SharedWithController extends Controller
{
    public function destroy( User $user)
    {
        $revoke = SharedWith::where('user_id','=',$user->id)->delete();
        return back()->with('success', 'Sharing Revoked!');
    }

    public function store(User $user ,Album $album)
    {
        $email = request($user->email);
        $userid = User::where('email','=',$email->User)->get();

        $sharedusers = Album::where('albums.user_id','=',Auth::id())
            ->join('shared_withs', 'albums.id', '=', 'shared_withs.album_id')
            ->join('users', 'shared_withs.user_id', '=', 'users.id')
            ->select('users.username', 'albums.name','albums.id','shared_withs.id')
            ->get();

        SharedWith::create([
            'user_id' => $userid->first()->id,
            'album_id' => $album->id,
            
        ]);
        // view('components.modal.sharing',['sharedusers'=>$sharedusers]);
        return back()->with('success', 'Album Shared With : '.$email->User);
    }

    public function index()
    {
        $sharedusers = Album::where('albums.user_id','=',Auth::id())
            ->join('shared_withs', 'albums.id', '=', 'shared_withs.album_id')
            ->join('users', 'shared_withs.user_id', '=', 'users.id')
            ->select('users.username', 'albums.name','albums.id','shared_withs.id')
            ->get();

        return view('admin.posts.editsharing',['sharedusers'=>$sharedusers]);
    }

    public function sharing()
    {
        return view('admin.posts.sharing');
    }

}
