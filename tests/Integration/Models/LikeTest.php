<?php

declare(strict_types=1);

use App\Models\Like;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

describe('relationships', function (): void {
    it('belongs to a user', function (): void {
        $like = Like::factory()->create();
        $user = $like->user;

        expect($user)
            ->toBeInstanceOf(User::class)
            ->and($user->id)->toEqual($like->user_id);
    });

    it('belongs to a news post', function (): void {
        $like = Like::factory()->create();
        $newsPost = $like->newsPost;

        expect($newsPost)
            ->toBeInstanceOf(\App\Models\NewsPost::class)
            ->and($newsPost->id)->toEqual($like->news_post_id);
    });
});

describe('casts', function (): void {
    it('casts timestamps to immutable_datetime', function (): void {
        $like = Like::factory()->create();

        expect($like->created_at)
            ->toBeInstanceOf(DateTimeImmutable::class)
            ->and($like->updated_at)->toBeInstanceOf(DateTimeImmutable::class);
    });

    it('casts deleted_at to nullable immutable_datetime', function (): void {
        $like = Like::factory()->create();
        $like->delete();

        expect($like->deleted_at)->toBeInstanceOf(DateTimeImmutable::class);
    });
});
