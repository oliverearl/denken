<?php

declare(strict_types=1);

use App\Models\Comment;
use App\Models\NewsPost;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

describe('relationships', function (): void {
    it('belongs to a user', function (): void {
        $comment = Comment::factory()->create();
        $user = $comment->user;

        expect($user)
            ->toBeInstanceOf(User::class)
            ->and($user->id)->toEqual($comment->user_id);
    });

    it('belongs to a news post', function (): void {
        $comment = Comment::factory()->create();
        $newsPost = $comment->newsPost;

        expect($newsPost)
            ->toBeInstanceOf(NewsPost::class)
            ->and($newsPost->id)->toEqual($comment->news_post_id);
    });
});

describe('casts', function (): void {
    it('casts timestamps to immutable_datetime', function (): void {
        $comment = Comment::factory()->create();

        expect($comment->created_at)
            ->toBeInstanceOf(DateTimeImmutable::class)
            ->and($comment->updated_at)->toBeInstanceOf(DateTimeImmutable::class);
    });

    it('casts deleted_at to nullable immutable_datetime', function (): void {
        $comment = Comment::factory()->create();
        $comment->delete();

        expect($comment->deleted_at)->toBeInstanceOf(DateTimeImmutable::class);
    });
});
