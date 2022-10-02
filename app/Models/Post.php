<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany, HasMany};

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'user_id',
        'title',
        'desc',
        'content',
        'category_id',
        'thumbnail'
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(): HasMany
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

    public function getPostDate(): string
    {
        return Carbon::parse($this->created_at)->format('F d, Y');
    }

    public function getPostDateSmall(): string
    {
        return Carbon::parse($this->created_at)->format('M d, Y');
    }

    public function scopeLike($query, $search): mixed
    {
        return $query->where('title', 'LIKE', "%{$search}%");
    }
}
