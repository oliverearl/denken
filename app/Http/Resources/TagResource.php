<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @property null|string $resource */
final class TagResource extends JsonResource
{
    /** @inheritDoc */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->resource,
            'href' => url('keywords/' . $this->resource), // TODO: Provide actual route.
        ];
    }
}
