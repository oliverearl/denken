<?php

declare(strict_types=1);

use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

describe('relationships', function (): void {
    it('belongs to a comment', function (): void {
        $commentLike = CommentLike::factory()->create();
        $comment = $commentLike->comment;

        expect($comment)
            ->toBeInstanceOf(Comment::class)
            ->and($comment->id)->toBe($commentLike->comment_id);
    });

    it('belongs to a user', function (): void {
        $commentLike = CommentLike::factory()->create();
        $user = $commentLike->user;

        expect($user)
            ->toBeInstanceOf(User::class)
            ->and($user->id)->toBe($commentLike->user_id);
    });
});

describe('casts', function (): void {
    it('casts timestamps correctly', function (): void {
        $commentLike = CommentLike::factory()->create();

        expect($commentLike->created_at)
            ->toBeInstanceOf(DateTimeImmutable::class)
            ->and($commentLike->updated_at)->toBeInstanceOf(DateTimeImmutable::class);
    });

    it('casts deleted_at correctly', function (): void {
        $commentLike = CommentLike::factory()->create();
        $commentLike->delete();

        expect($commentLike->deleted_at)
            ->toBeInstanceOf(DateTimeImmutable::class);
    });
});
