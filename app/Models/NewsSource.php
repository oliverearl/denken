<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Bias;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsSource extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that should be hidden.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'is_banned',
        'last_reviewed_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * A news source has a set of social media links.
     */
    public function socialMedia(): HasOne
    {
        return $this->hasOne(
            related: NewsSourceSocialMedia::class,
            foreignKey: 'news_source_id',
            localKey: 'id',
        );
    }

    /**
     * A news source has one or many news articles.
     */
    public function newsArticles(): HasMany
    {
        return $this->hasMany(NewsArticle::class);
    }

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'bias' => Bias::class,
            'is_active' => 'boolean',
            'is_verified' => 'boolean',
            'is_banned' => 'boolean',
            'last_reviewed_at' => 'immutable_datetime',
            'created_at' => 'immutable_datetime',
            'updated_at' => 'immutable_datetime',
            'deleted_at' => 'immutable_datetime',
            'meta' => 'array',
        ];
    }
}
