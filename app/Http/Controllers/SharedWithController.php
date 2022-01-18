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
        SharedWith::where('user_id','=',$user->id)->delete();
        return back()->with('success', 'Sharing Revoked!');
    }

    public function store(User $user ,Album $album)
    {
        $email = request($user->email);
        $userid = User::where('email','=',$email->User)->get();

        SharedWith::create([
            'user_id' => $userid->first()->id,
            'album_id' => $album->id,
            
        ]);
        return back()->with('success', 'Album Shared With : '.$email->User);
    }

    public function index(Album $album)
    {
        $sharedusers = Album::where('albums.user_id','=',Auth::id())
            ->where('albums.id','=',$album->id)
            ->join('shared_withs', 'albums.id', '=','shared_withs.album_id')
            ->join('users', 'shared_withs.user_id', '=', 'users.id')
            ->select('users.username', 'users.name','users.id')
            ->get();
        return response()->json([
            'shareduser'=> $sharedusers
        ]);
    }

}
