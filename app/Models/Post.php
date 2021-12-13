<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $gaurded = ['id'];
    // protected $fillable =['title','slug','excerpt','body'];
    //use php artisan tinker then Post::create('key'=>'value','key'=>'value'); for single entry
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
