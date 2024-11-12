<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Search;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title',
        'cover',
        'body_content',
        'status',
        'user_id',
        'category'
    ];

    public function scopeFilter(Builder $query, array $filters): void {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) => $query->where('title', 'like', '%' . $search . '%')
        );
        
        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) => $query->where('category', 'like', '%' . $category . '%')
        );
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function author(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
}
