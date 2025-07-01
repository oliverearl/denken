<?php

declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravolt\Avatar\Facade as Avatar;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'fallback_avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /** @inheritDoc */
    protected static function booted(): void
    {
        parent::booted();

        // Assign a fallback avatar when creating a user, or updating their name.
        $assignAvatar = static function (self $user): void {
            if (empty($user->fallback_avatar) || $user->isDirty('name')) {
                $user->fallback_avatar = Str::remove(
                    search: 'data:image/png;base64,',
                    subject: Avatar::create($user->name)->toBase64(),
                );
            }
        };

        static::creating($assignAvatar);
        static::updating($assignAvatar);
    }

    /**
     * A user has one or many news posts.
     */
    public function newsPosts(): HasMany
    {
        return $this->hasMany(NewsPost::class);
    }

    /**
     * A user has one or many comments.
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * A user has one or many likes.
     */
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    /**
     * A user has one or many comment likes.
     */
    public function commentLikes(): HasMany
    {
        return $this->hasMany(CommentLike::class);
    }

    /**
     * Retrieve the fallback avatar, and append the base64 prefix so it can be rendered.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute<string, never>
     */
    protected function fallbackAvatar(): Attribute
    {
        return Attribute::make(
            get: static fn(?string $value): ?string => !empty($value)
                ? 'data:image/png;base64,' . base64_encode($value)
                : null,
        );
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
