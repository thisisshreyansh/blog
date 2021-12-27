<?php

namespace App\Http\Controllers;

use App\Models\Category;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Validation\Rule;
use \Illuminate\Http\Response;
class DownloadFileController extends Controller
{
    function downloadFile($file_name){
        return response()->download(public_path('storage/thumbnails/'.$file_name));
    }

    public function category()
    {
        return view('admin.posts.category');
    }

    public function store(Category $category)
    {
        
        $category->create([
            'name' => request('name'),
            'slug' => request('slug')
        ]);
        return redirect('admin/posts')->with('success', 'Category Added');
    }

}