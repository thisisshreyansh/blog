<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use \Illuminate\Http\Response;
class DownloadFileController extends Controller
{
    function downloadFile($file_name){
        // $dl = File::find($file_name);
        return response()->download(public_path('storage/thumbnails/'.$file_name));
    }
}