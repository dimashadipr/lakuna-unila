<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Search;

class Post extends Model
{
    use HasFactory;

    protected $with = ['authhor'];

    protected $fillable = [
        'title',
        'cover',
        'slug',
        'body_content',
        'status',
        'category',
        'user_id',
    ];

    public function author(): BelongsTo {
        return $this->belongsTo(User::class);
    }

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
}
