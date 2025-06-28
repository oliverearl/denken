<?php

declare(strict_types=1);

use App\Models\Like;
use App\Models\NewsArticle;
use App\Models\NewsPost;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

describe('relationships', function (): void {
    it('can retrieve its user', function (): void {
        $newsPost = NewsPost::factory()->create();
        $user = $newsPost->user;

        expect($user)
            ->toBeInstanceOf(User::class)
            ->and($user->id)->toEqual($newsPost->user_id);
    });

    it('can retrieve its news article', function (): void {
        $newsPost = NewsPost::factory()->create();
        $newsArticle = $newsPost->newsArticle;

        expect($newsArticle)
            ->toBeInstanceOf(NewsArticle::class)
            ->and($newsArticle->id)->toEqual($newsPost->news_article_id);
    });

    it('can retrieve its likes', function (): void {
        $newsPost = NewsPost::factory()->create();
        Like::factory()->count(3)->for($newsPost)->create();
        $likes = $newsPost->likes;

        expect($likes)
            ->toBeCollection()
            ->and($likes->first())
                ->toBeInstanceOf(Like::class)
                ->and($likes->first()->news_post_id)->toEqual($newsPost->id);
    });
});

describe('casts', function (): void {
    it('casts is_limited, is_hidden, and is_pinned to boolean', function (): void {
        $newsPost = NewsPost::factory()->create([
            'is_limited' => 1,
            'is_hidden' => 0,
            'is_pinned' => 1,
        ]);

        expect($newsPost->is_limited)->toBeTrue()
            ->and($newsPost->is_hidden)->toBeFalse()
            ->and($newsPost->is_pinned)->toBeTrue();
    });

    it('casts meta to array', function (): void {
        $newsPost = NewsPost::factory()->create(['meta' => ['key' => 'value']]);

        expect($newsPost->meta)
            ->toBeArray()
            ->and($newsPost->meta['key'])->toEqual('value');
    });

    it('casts its timestamps to immutable datetimes', function (): void {
        $newsPost = NewsPost::factory()->create();

        expect($newsPost->created_at)
            ->toBeInstanceOf(DateTimeImmutable::class)
            ->and($newsPost->updated_at)->toBeInstanceOf(DateTimeImmutable::class);

        $newsPost->delete();

        expect($newsPost->deleted_at)
            ->toBeInstanceOf(DateTimeImmutable::class)
            ->and($newsPost->trashed())->toBeTrue();
    });
});
