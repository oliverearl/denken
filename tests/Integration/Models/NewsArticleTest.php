<?php

declare(strict_types=1);

use App\Models\NewsArticle;
use App\Models\NewsPost;
use App\Models\NewsSource;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

describe('relationships', function (): void {
    it('belongs to a news source', function (): void {
        $newsArticle = NewsArticle::factory()->create();
        $newsSource = $newsArticle->newsSource;

        expect($newsSource)
            ->toBeInstanceOf(NewsSource::class)
            ->and($newsSource->id)->toEqual($newsArticle->news_source_id);
    });

    it('has many posts', function (): void {
        $newsArticle = NewsArticle::factory()->create();
        NewsPost::factory()->count(3)->for($newsArticle)->create();
        $posts = $newsArticle->newsPosts;

        expect($posts)
            ->not()->toBeEmpty()
            ->and($posts->first())
                ->toBeInstanceOf(NewsPost::class)
                ->news_article_id->toEqual($newsArticle->id);
    });
});

describe('casts', function (): void {
    it('casts json fields to arrays', function (): void {
        $meta = ['foo' => 'bar'];

        $newsArticle = NewsArticle::factory()->create([
            'meta' => $meta,
        ]);

        expect($newsArticle->tags)->toBeArray()->not()->toBeEmpty()
            ->and($newsArticle->keywords)->toBeArray()->not()->toBeEmpty()
            ->and($newsArticle->meta)->toBeArray()->toEqual($meta);
    });

    it('casts published_at to immutable_datetime', function (): void {
        $newsArticle = NewsArticle::factory()->create();

        expect($newsArticle->published_at)->toBeInstanceOf(DateTimeImmutable::class);
    });

    it('casts timestamps to immutable_datetime', function (): void {
        $newsArticle = NewsArticle::factory()->create();

        expect($newsArticle->created_at)->toBeInstanceOf(DateTimeImmutable::class)
            ->and($newsArticle->updated_at)->toBeInstanceOf(DateTimeImmutable::class);
    });
});
