<?php

declare(strict_types=1);

use Lines\News\Domain\Actions\UpdatePostAction;
use Lines\News\Domain\DataTransferObjects\PostData;
use Lines\News\Domain\Models\Post;
use Lines\News\Tests\TestCase;

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;

uses(TestCase::class);

describe('UpdatePostAction', function () {
    it('updates an existing post', function () {
        $original = Post::factory()->draft()->create();
        $updated = Post::factory()->existing($original)->make()->toArray();

        (new UpdatePostAction)(PostData::fromArray($updated));

        assertDatabaseCount(Post::class, 1);
        assertDatabaseHas(Post::class, $updated);
    });
});
