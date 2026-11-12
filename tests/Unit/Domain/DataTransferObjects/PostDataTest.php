<?php

declare(strict_types=1);

use Carbon\CarbonImmutable;
use Lines\News\Domain\DataTransferObjects\PostData;
use Lines\News\Domain\Enums\PostStatus;
use Lines\News\Tests\TestCase;
use Lines\Support\Core\SharedKernel\ValueObjects\UserId;

uses(TestCase::class);

describe('PostData', function () {
    describe('fromArray', function () {
        it('holds the author as a UserId', function () {
            $data = PostData::fromArray([
                'author_id' => '9b2f6d1e-3c4a-4f5b-8e7d-1a2b3c4d5e6f',
                'title' => fake()->words(asText: true),
                'body' => fake()->paragraphs(asText: true),
            ]);

            expect($data->author_id)->toBeInstanceOf(UserId::class)
                ->and((string) $data->author_id)->toBe('9b2f6d1e-3c4a-4f5b-8e7d-1a2b3c4d5e6f');
        });

        describe('status', function () {
            it('is computed from the published_at property', function () {
                $draft = PostData::fromArray([
                    'author_id' => '9b2f6d1e-3c4a-4f5b-8e7d-1a2b3c4d5e6f',
                    'title' => fake()->words(asText: true),
                    'body' => fake()->paragraphs(asText: true),
                ]);

                expect($draft)->toHaveProperty('status', PostStatus::Draft);

                $scheduled = PostData::fromArray([
                    'author_id' => '9b2f6d1e-3c4a-4f5b-8e7d-1a2b3c4d5e6f',
                    'title' => fake()->words(asText: true),
                    'body' => fake()->paragraphs(asText: true),
                    'published_at' => now()->addWeek()->toDateString(),
                ]);

                expect($scheduled)->toHaveProperty('status', PostStatus::Scheduled);

                $published = PostData::fromArray([
                    'author_id' => '9b2f6d1e-3c4a-4f5b-8e7d-1a2b3c4d5e6f',
                    'title' => fake()->words(asText: true),
                    'body' => fake()->paragraphs(asText: true),
                    'published_at' => now()->subWeek()->toDateString(),
                ]);

                expect($published)->toHaveProperty('status', PostStatus::Published);
            });
        });

        describe('published_at', function () {
            it('casts to CarbonImmutable', function () {
                $dto = PostData::fromArray([
                    'author_id' => '9b2f6d1e-3c4a-4f5b-8e7d-1a2b3c4d5e6f',
                    'title' => fake()->words(asText: true),
                    'body' => fake()->paragraphs(asText: true),
                    'published_at' => '2026-01-01 00:00:00',
                ]);

                expect($dto->published_at)
                    ->toBeInstanceOf(CarbonImmutable::class)
                    ->and($dto->published_at->format('Y-m-d'))
                    ->toBe('2026-01-01');
            });

            it('is nullable', function () {
                $dto = PostData::fromArray([
                    'author_id' => '9b2f6d1e-3c4a-4f5b-8e7d-1a2b3c4d5e6f',
                    'title' => fake()->words(asText: true),
                    'body' => fake()->paragraphs(asText: true),
                ]);

                expect($dto->published_at)->toBeNull();
            });
        });

        describe('created_at', function () {
            it('casts to CarbonImmutable', function () {
                $dto = PostData::fromArray([
                    'author_id' => '9b2f6d1e-3c4a-4f5b-8e7d-1a2b3c4d5e6f',
                    'title' => fake()->words(asText: true),
                    'body' => fake()->paragraphs(asText: true),
                    'created_at' => '2026-01-01 00:00:00',
                ]);

                expect($dto->created_at)
                    ->toBeInstanceOf(CarbonImmutable::class)
                    ->and($dto->created_at->format('Y-m-d'))
                    ->toBe('2026-01-01');
            });

            it('is nullable', function () {
                $dto = PostData::fromArray([
                    'author_id' => '9b2f6d1e-3c4a-4f5b-8e7d-1a2b3c4d5e6f',
                    'title' => fake()->words(asText: true),
                    'body' => fake()->paragraphs(asText: true),
                ]);

                expect($dto->created_at)->toBeNull();
            });
        });

        describe('updated_at', function () {
            it('casts to CarbonImmutable', function () {
                $dto = PostData::fromArray([
                    'author_id' => '9b2f6d1e-3c4a-4f5b-8e7d-1a2b3c4d5e6f',
                    'title' => fake()->words(asText: true),
                    'body' => fake()->paragraphs(asText: true),
                    'updated_at' => '2026-01-01 00:00:00',
                ]);

                expect($dto->updated_at)
                    ->toBeInstanceOf(CarbonImmutable::class)
                    ->and($dto->updated_at->format('Y-m-d'))
                    ->toBe('2026-01-01');
            });

            it('is nullable', function () {
                $dto = PostData::fromArray([
                    'author_id' => '9b2f6d1e-3c4a-4f5b-8e7d-1a2b3c4d5e6f',
                    'title' => fake()->words(asText: true),
                    'body' => fake()->paragraphs(asText: true),
                ]);

                expect($dto->updated_at)->toBeNull();
            });
        });

        describe('deleted_at', function () {
            it('casts to CarbonImmutable', function () {
                $dto = PostData::fromArray([
                    'author_id' => '9b2f6d1e-3c4a-4f5b-8e7d-1a2b3c4d5e6f',
                    'title' => fake()->words(asText: true),
                    'body' => fake()->paragraphs(asText: true),
                    'deleted_at' => '2026-01-01 00:00:00',
                ]);

                expect($dto->deleted_at)
                    ->toBeInstanceOf(CarbonImmutable::class)
                    ->and($dto->deleted_at->format('Y-m-d'))
                    ->toBe('2026-01-01');
            });

            it('is nullable', function () {
                $dto = PostData::fromArray([
                    'author_id' => '9b2f6d1e-3c4a-4f5b-8e7d-1a2b3c4d5e6f',
                    'title' => fake()->words(asText: true),
                    'body' => fake()->paragraphs(asText: true),
                ]);

                expect($dto->deleted_at)->toBeNull();
            });
        });
    });
});
