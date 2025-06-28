<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsPost extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'content',
        'user_id',
        'news_article_id',
        'is_limited',
        'is_hidden',
        'is_pinned',
        'geolocation',
    ];

    /**
     * The attributes that should be hidden.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'is_limited',
        'meta',
        'deleted_at',
    ];

    /**
     * A news post belongs to a user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A news post belongs to a news article.
     */
    public function newsArticle(): BelongsTo
    {
        return $this->belongsTo(NewsArticle::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'is_limited' => 'boolean',
            'is_hidden' => 'boolean',
            'is_pinned' => 'boolean',
            'meta' => 'array',
            'created_at' => 'immutable_datetime',
            'updated_at' => 'immutable_datetime',
            'deleted_at' => 'immutable_datetime',
        ];
    }
}
