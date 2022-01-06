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
        // $path = public_path();
        // return response()->download();
    }

    function downloadAlbum($id){
        $public_dir=public_path('/storage/public');
        $zipFileName = 'invoicezipfile.zip';
        $zip = new ZipArchive;
        if ($zip->open($public_dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
            // Add File in ZipArchive
            $invoice_file = Image::where('album_id',$id)->get();
            // dd($invoice_file);
            foreach ($invoice_file as $img) {
                $zip->addFile($public_dir . '/'.$img,substr($img,11));
                ddd($zip);
              }
            $zip->close();
        }
        // ddd($zip);
        // Set Header
        $headers = array(
            'Content-Type' => 'application/octet-stream',
        );
        $filetopath=$public_dir.'/'.$zipFileName;

        // Create Download Response
        if(file_exists($filetopath)){
            return response()->download($filetopath,$zipFileName,$headers);
        }
        // }
        return redirect('posts/'.$id);
    }
    
}

/*

/public
->albums
    ->album id
        -> thumbnails (image processing extensions)
        -> images
        ->album_cover.png
*/