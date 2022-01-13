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
   
        if ($zip->open(public_path().'/storage/public/album/'.$fileName, ZipArchive::CREATE) === TRUE)
        {
            $files = Image::where('id','=',$id)->get();
            // dd($files);
            foreach ($files as $img) {
                $image = public_path().'/storage/public/album/'.$id.'/images'.'/'.$img->path;

                $zip->addFile($image,$img->path);
                // dd($zip);
            }
            // dd($zip);
            $zip->close();
            
        }
        return response()->download(public_path().'/storage/public/album/'.$fileName);
    }
    

    public function searchAlbum(Request $request){
        
        if($request->ajax()) {
          
            $data = Album::where('name', 'LIKE', $request->name.'%')
                ->get();
           
            $output = '';
           
            if (count($data)>0) {
              
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
              
                foreach ($data as $row){
                   
                    $output .= '<li class="list-group-item">'.$row->name.'</li>';
                }
              
                $output .= '</ul>';
            }
            else {
             
                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }
           
            return $output;
        }
    }

    public function searchImage(Request $request){
        
        if($request->ajax()) {
          
            $data = Image::where('name', 'LIKE', '%'.$request->name.'%')
                        ->where('album_id','LIKE','%'.$request->album_id.'%')
                ->get();
           
            $output = '';
           
            if (count($data)>0) {
              
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
              
                foreach ($data as $row){
                   
                    $output .= '<li class="list-group-item">'.$row->name.'</li>';
                }
              
                $output .= '</ul>';
            }
            else {
             
                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }
           
            return $output;
        }
    }
}
