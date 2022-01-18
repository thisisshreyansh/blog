<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Image;
use Illuminate\Http\Request;
use ZipArchive;
class DownloadFileController extends Controller
{
    function downloadFile($file_name){
        $dl = Image::where('path','=',$file_name)->first();
        return response()->download(public_path('storage/public/album/'.$dl->album_id.'/images'.'/'.$file_name));
    }

    function downloadAlbum($id){
        $zip = new ZipArchive;
   
        $fileName = $id.'.zip';
        // dd($fileName);
        if ($zip->open(public_path().'/storage/public/album/'.$fileName, ZipArchive::CREATE) === TRUE)
        {
            $files = Image::where('album_id','=',$id)->get();
            // dd($files->count());
            if ($files->count()>0) {
                foreach ($files as $img) {
                    $image = public_path().'/storage/public/album/'.$id.'/images'.'/'.$img->path;

                    $zip->addFile($image, $img->path);
                    // dd($zip);
                }
                // dd($zip);
                $zip->close();
                return response()->download(public_path().'/storage/public/album/'.$fileName);
            }
        }
        return back()->with('warning', 'No Images to download');
    }
    




}
