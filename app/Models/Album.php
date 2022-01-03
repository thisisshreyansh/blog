<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $gaurded = [];
    protected $primaryKey = 'album_id';

    public function image()
    {
        return $this->hasMany(image::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id'); //user_id is forigen key if we give name author laravel think author forigenkey is author_id
    }

}
