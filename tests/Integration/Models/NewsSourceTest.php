<?php

declare(strict_types=1);

use App\Enums\Bias;
use App\Models\NewsArticle;
use App\Models\NewsSource;
use App\Models\NewsSourceSocialMedia;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

describe('relationships', function (): void {
    it('can retrieve its social media entries from the dedicated model', function (): void {
        $newsSource = NewsSource::factory()->create();
        $socialMedia = NewsSourceSocialMedia::factory()->for($newsSource)->create();

        expect($newsSource->socialMedia)
            ->toBeInstanceOf(NewsSourceSocialMedia::class)
            ->and($newsSource->socialMedia->id)->toEqual($socialMedia->id);
    });

    it('can have multiple news articles', function (): void {
        $count = 3;
        $newsSource = NewsSource::factory()->create();
        NewsArticle::factory()->count($count)->for($newsSource)->create();

        expect($newsSource->newsArticles)
            ->and($newsSource->newsArticles->count())->toEqual($count)
            ->and($newsSource->newsArticles->first())->toBeInstanceOf(NewsArticle::class);
    });
});

describe('casts', function (): void {
    it('casts the bias attribute to Bias enum', function (): void {
        $newsSource = NewsSource::factory()->create(['bias' => Bias::LEFT]);

        expect($newsSource->bias)->toBeInstanceOf(Bias::class)
            ->and($newsSource->bias->value)->toEqual('left');
    });

    it('casts is_active, is_verified, and is_banned to boolean', function (): void {
        $newsSource = NewsSource::factory()->create([
            'is_active' => 1,
            'is_verified' => 0,
            'is_banned' => 1,
        ]);

        expect($newsSource->is_active)->toBeTrue()
            ->and($newsSource->is_verified)->toBeFalse()
            ->and($newsSource->is_banned)->toBeTrue();
    });

    it('casts timestamps to immutable_datetime', function (): void {
        $newsSource = NewsSource::factory()->create();

        expect($newsSource->created_at)->toBeInstanceOf(DateTimeImmutable::class)
            ->and($newsSource->updated_at)->toBeInstanceOf(DateTimeImmutable::class);
    });

    it('casts meta to array', function (): void {
        $meta = ['key' => 'value'];
        $newsSource = NewsSource::factory()->create(['meta' => $meta]);

        expect($newsSource->meta)->toBeArray()
            ->and($newsSource->meta)->toEqual($meta);
    });
});
