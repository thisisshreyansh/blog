<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedWith extends Model
{
    use HasFactory;
    protected $gaurded = [];

    public function author()
    {
        return $this->belongsTo(User::class,'user_id'); //user_id is forigen key if we give name author laravel think author forigenkey is author_id
    }
    
    public function album()
    {
        return $this->belongsTo(Album::class);
    }

}
