<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Validation\Rule;
use \Illuminate\Http\Response;
use ZipArchive;
class DownloadFileController extends Controller
{
    function downloadFile($file_name){
        $dl = Image::where('image_path','=',$file_name)->first();
        return response()->download(public_path('storage/public/album/'.$dl->album_id.'/images'.'/'.$file_name));
    }

    function downloadAlbum($id){
        $zip = new ZipArchive;
   
        $fileName = $id.'.zip';
   
        if ($zip->open(public_path().'/storage/public/album/'.$fileName, ZipArchive::CREATE) === TRUE)
        {
            $files = Image::where('album_id','=',$id)->get();
            // dd($files);
            foreach ($files as $img) {
                $image = public_path().'/storage/public/album/'.$id.'/images'.'/'.$img->image_path;

                $zip->addFile($image,$img->image_path);
                // dd($zip);
            }
            // dd($zip);
            $zip->close();
            
        }
        return response()->download(public_path().'/storage/public/album/'.$fileName);
    }
    
}
