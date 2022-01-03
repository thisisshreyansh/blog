<?php

namespace App\Http\Controllers;

use App\Models\SharedWith;
use Illuminate\Http\Request;

class SharedWithController extends Controller
{
    public function destroy( SharedWith $shared)
    {
        $shared->where('album_id',$shared->album_id)->delete();

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
        return view('admin.posts.editsharing');
    }

    public function sharing()
    {
        return view('admin.posts.sharing');
    }

}
