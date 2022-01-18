<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $gaurded = [];
    protected $primaryKey = 'id';

    public function image()
    {
        return $this->hasMany(image::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id'); //user_id is forigen key if we give name author laravel think author forigenkey is author_id
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['searchAlbum'] ?? false, fn($query, $searchAlbum) =>
            $query->where(fn($query) =>
                $query
                    ->where('name', 'like', '%' . $searchAlbum . '%')
            )
        );
        
    }
}
