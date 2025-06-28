<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\NewsPost */
final class NewsPostResource extends JsonResource
{
    /** @inheritDoc */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'user_id' => $this->user_id,
            'is_hidden' => $this->is_hidden,
            'is_pinned' => $this->is_pinned,
            'geolocation' => $this->geolocation,
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
            'news_article' => $this->whenLoaded('newsArticle', NewsArticleResource::make($this->newsArticle)),
        ];
    }
}
