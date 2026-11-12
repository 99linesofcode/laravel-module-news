<?php

declare(strict_types=1);

namespace Lines\News\Domain\Models;

use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Lines\News\Database\Factories\PostFactory;
use Lines\News\Domain\Enums\PostStatus;
use Lines\Support\Core\SharedKernel\ValueObjects\AsUserId;
use Lines\Support\Core\SharedKernel\ValueObjects\UserId;

/**
 * @property UserId $author_id
 */
#[UseFactory(PostFactory::class)]
class Post extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'author_id',
        'title',
        'body',
        'status',
        'published_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, mixed>
     */
    protected function casts(): array
    {
        return [
            'author_id' => AsUserId::class,
            'published_at' => 'datetime',
            'status' => PostStatus::class,
        ];
    }
}
