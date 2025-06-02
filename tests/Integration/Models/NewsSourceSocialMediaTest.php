<?php

declare(strict_types=1);

use App\Models\NewsSource;
use App\Models\NewsSourceSocialMedia;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

describe('relationships', function (): void {
    it('belongs to a news source', function (): void {
        $newsSourceSocialMedia = NewsSourceSocialMedia::factory()->create();
        $newsSource = $newsSourceSocialMedia->newsSource;

        expect($newsSource)
            ->toBeInstanceOf(NewsSource::class)
            ->and($newsSource->id)->toEqual($newsSourceSocialMedia->news_source_id);
    });
});

describe('casts', function (): void {
    it('casts timestamps to immutable_datetime', function (): void {
        $socialMedia = NewsSourceSocialMedia::factory()->create();

        expect($socialMedia->created_at)->toBeInstanceOf(DateTimeImmutable::class)
            ->and($socialMedia->updated_at)->toBeInstanceOf(DateTimeImmutable::class);
    });
});
