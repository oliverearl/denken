<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\NewsArticle */
final class NewsArticleResource extends JsonResource
{
    /** @inheritDoc */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'news_source' => $this->whenLoaded('newsSource', NewsSourceResource::make($this->newsSource)),
            'url' => $this->url,
            'canonical_url' => $this->canonical_url,
            'title' => $this->title,
            'summary' => $this->summary,
            'published_at' => $this->published_at->toIso8601String(),
            'image_url' => $this->image_url,
            'keywords' => $this->keywords ?? [],
            'tags' => $this->tags ?? [],
        ];
    }
}
