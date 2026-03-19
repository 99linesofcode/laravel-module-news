<?php

declare(strict_types=1);

namespace Lines\News\Domain\Enums;

use DomainException;

enum PostStatus: string
{
    case Draft = 'draft';
    case Scheduled = 'scheduled';
    case Published = 'published';

    public function transitionTo(self $next): self
    {
        if ($this === $next) {
            return $this;
        }

        if (! $this->canTransitionTo($next)) {
            throw new DomainException("Cannot transition from {$this->value} to {$next->value}.");
        }

        return $next;
    }

    private function canTransitionTo(self $next): bool
    {
        return match ($this) {
            self::Draft => in_array($next, [self::Scheduled, self::Published]),
            self::Scheduled => in_array($next, [self::Draft, self::Published]),
            self::Published => in_array($next, [self::Draft, self::Scheduled]),
        };
    }
}
