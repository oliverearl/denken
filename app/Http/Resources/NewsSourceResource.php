<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\NewsSource */
final class NewsSourceResource extends JsonResource
{
    /** @inheritDoc */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'domain' => $this->domain,
            'country' => $this->country,
            'language' => $this->language,
            'homepage' => $this->homepage,
            'is_verified' => $this->is_verified,
            'social_media' => $this->whenLoaded('socialMedia', NewsSourceSocialMediaResource::make($this->socialMedia)),
        ];
    }
}
