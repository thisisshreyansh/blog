<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // protected $gaurded = ['id'];
    protected $with = ['category','author']; //this is eager load , after adding this we don't have to add same in every query under web.php , if we don't add this we will perform amany query and has n+1 problem
    // protected $fillable =['title','slug','excerpt','body'];
    //use php artisan tinker then Post::create('key'=>'value','key'=>'value'); for single entry

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id'); //user_id is forigen key if we give name author laravel think author forigenkey is author_id
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query
                    ->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('category', fn ($query) =>
                $query->where('slug', $category)
            )
        );

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn ($query) =>
                $query->where('username', $author)
            )
        );
    }

    
}
