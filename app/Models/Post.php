<?php
namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

use function PHPUnit\Framework\throwException;

class Post{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt,$date,$body,$slug)
    {
        $this -> title = $title;
        $this -> excerpt = $excerpt;
        $this -> date = $date;
        $this -> body = $body;
        $this -> slug = $slug;
    }

    public static function find($slug)
    {
        $posts = static::all();
        return $posts-> firstWhere('slug' , $slug);
    }

    public static function findorfail($slug)
    {
        $posts = static::find($slug);
        if(!$posts){
            throw new ModelNotFoundException();
        }
        return $posts;
    }

    public static function all()
    {   
        // or use remeber forver without time
        return cache()->remember('posts.all',3,function(){
            return collect(File::files(resource_path("post")))
            ->map(fn ($file)=> YamlFrontMatter::parseFile($file))
            ->map(fn($document)=> new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
            )
            )
            ->sortByDesc('date');
        }
    );
    }
}
