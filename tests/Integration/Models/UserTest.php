<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

describe('events', function (): void {
    it('will generate a fallback avatar when creating a user', function (): void {
        $user = User::factory()->create();

        expect($user->fallback_avatar)
            ->not()->toBeEmpty()
            ->toBeString();
    });

    it('will generate a fallback avatar when updating a user', function (): void {
        $user = Model::withoutEvents(
            fn() => User::factory()->create(['fallback_avatar' => null]),
        );

        expect($user->fallback_avatar)->toBeNull();

        $user->name = 'New Name';
        $user->save();

        expect($user->fallback_avatar)
            ->not()->toBeEmpty()
            ->toBeString();
    });
});

describe('attributes', function (): void {
    it('will return a fallback avatar as a base64 encoded string', function (): void {
        $user = User::factory()->create();

        expect($user->fallback_avatar)
            ->not()->toBeEmpty()
            ->toBeString()
            ->toStartWith('data:image/png;base64,');
    });

    it('will return null if no fallback avatar is set', function (): void {
        $user = Model::withoutEvents(
            fn() => User::factory()->create(['fallback_avatar' => null]),
        );

        expect($user->fallback_avatar)->toBeNull();
    });
});
