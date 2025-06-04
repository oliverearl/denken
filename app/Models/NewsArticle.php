<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsArticle extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'news_source_id',
        'url',
        'canonical_url',
        'title',
        'summary',
        'excerpt',
        'content_hash',
        'published_at',
        'image_url',
        'keywords',
        'tags',
        'meta',
    ];

    /**
     * The attributes that should be hidden.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'content_hash',
        'created_at',
        'updated_at',
        'deleted_at',
        'meta',
    ];

    /**
     * A news article belongs to a news source.
     */
    public function newsSource(): BelongsTo
    {
        return $this->belongsTo(NewsSource::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, mixed>
     */
    protected function casts(): array
    {
        return [
            'published_at' => 'immutable_datetime',
            'created_at' => 'immutable_datetime',
            'updated_at' => 'immutable_datetime',
            'deleted_at' => 'immutable_datetime',
            'keywords' => 'array',
            'tags' => 'array',
            'meta' => 'array',
        ];
    }
}
