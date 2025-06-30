<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Comment */
class CommentResource extends JsonResource
{
    /** @inheritDoc */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'is_hidden' => $this->is_hidden,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'news_post_id' => $this->news_post_id,
            'user_id' => $this->user_id,
            'user' => $this->whenLoaded('user', OtherUserResource::make($this->user)),
            'news_post' => $this->whenLoaded('newsPost', NewsPostResource::make($this->newsPost)),
        ];
    }
}
