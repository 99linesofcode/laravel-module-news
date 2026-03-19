<?php

declare(strict_types=1);

namespace Lines\News\Domain\DataTransferObjects;

use Carbon\CarbonImmutable;
use Lines\News\Domain\Enums\PostStatus;
use Lines\Support\Domain\DataTransferObjects\DataTransferObject;

final readonly class PostData extends DataTransferObject
{
    protected static function casts(): array
    {
        return [
            'status' => fn ($_v, $data) => self::computedStatus($data),
            'published_at' => fn ($v) => self::castCarbonOrNull($v),
            'created_at' => fn ($v) => self::castCarbonOrNull($v),
            'updated_at' => fn ($v) => self::castCarbonOrNull($v),
            'deleted_at' => fn ($v) => self::castCarbonOrNull($v),
        ];
    }

    protected function __construct(
        public ?string $id,
        public int $author_id,
        public string $title,
        public string $body,
        public PostStatus $status,
        public ?CarbonImmutable $published_at,
        public ?CarbonImmutable $created_at,
        public ?CarbonImmutable $updated_at,
        public ?CarbonImmutable $deleted_at,
    ) {}

    private static function castCarbonOrNull(?string $value): ?CarbonImmutable
    {
        return ! is_null($value) ? CarbonImmutable::parse($value) : null;
    }

    private static function computedStatus(array $data): PostStatus
    {
        if (isset($data['published_at'])) {
            $date = self::casts()['published_at']($data['published_at']);
        } else {
            $date = null;
        }

        return match (true) {
            is_null($date) => PostStatus::Draft,
            $date->isPast() => PostStatus::Published,
            $date->isFuture() => PostStatus::Scheduled,
        };
    }
}
