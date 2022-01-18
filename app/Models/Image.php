<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $gaurded = [];
    
    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id'); //user_id is forigen key if we give name author laravel think author forigenkey is author_id
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['searchImage'] ?? false, fn($query, $searchImage) =>
            $query->where(fn($query) =>
                $query
                    ->where('name', 'like', '%' . $searchImage . '%')
            )
        );
        
    }
}
