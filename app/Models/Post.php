<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['author', 'title', 'desc', 'content', 'category_id', 'thumbnail'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getImage()
    {
        if (!$this->thumbnail) {
            return asset("no-image.png");
        }

        return asset("uploads/{$this->thumbnail}");
    }

    public function getPostDate()
    {
        return Carbon::parse($this->created_at)->format('F d, Y');
    }

    public function getPostDateSmall()
    {
        return Carbon::parse($this->created_at)->format('M d, Y');
    }
}
