<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\NewsSourceSocialMedia */
final class NewsSourceSocialMediaResource extends JsonResource
{
    /** @inheritDoc */
    public function toArray(Request $request): array
    {
        return [
            'facebook' => $this->facebook,
            'x' => $this->x,
            'instagram' => $this->instagram,
            'tiktok' => $this->tiktok,
            'threads' => $this->threads,
            'bsky' => $this->bsky,
            'linkedin' => $this->linkedin,
        ];
    }
}
